<?php
namespace Managers;

/****************************************************************************
 * Copyright (C) 2020, Sarah-Jane Whittaker (sarah@cs.queensu.ca)
 *
 * This program is free software: you can redistribute it and/or modify it 
 * under the terms of the GNU Affero General Public License as published by 
 * the Free Software Foundation, either version 3 of the License, or (at 
 * your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful, but
 * WITHOUT ANY WARRANTY; without even the implied warranty of 
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU Affero 
 * General Public License for more details.
 * 
 * You should have received a copy of the GNU Affero General Public License 
 * along with this program in the file gnu-agpl-3.0.txt. If not, 
 * see <https://www.gnu.org/licenses/>.
 * 
 * This program was developed with the input and support of the Queen's
 * University School of Computing <https://www.cs.queensu.ca/>, Faculty
 * of Arts and Science <https://www.queensu.ca/artsci/> and the Office of 
 * the Vice-Provost (Teaching and Learning) 
 * <https://www.queensu.ca/provost/teaching-and-learning>.
 ***************************************************************************/

use PDO;
use PDOException;

/**
 * This abstract class contains the functionality to connect to a database via
 * PDO and perform queries.
 */
abstract class DatabaseManager {
    /**************************************************************************
     * Constants
     **************************************************************************/
    private const ERROR_MESSAGE_CONNECTION_EXCEPTION = 'There was an error connecting to the database. Please contact your systems administrator.';
    private const ERROR_MESSAGE_PREPARE_QUERY = 'There was an error preparing the following database query: ';
    private const ERROR_MESSAGE_EXECUTE_QUERY = 'There was an error executing the following database query: ';


    /**************************************************************************
     * Member Variables
     **************************************************************************/
    protected $pdo = null;
    protected $databaseName = null;
    protected $hostName = null;
    protected $userName = null;


    /**************************************************************************
     * Abstract Methods
     **************************************************************************/
    abstract protected function getDatabasePassword();


    /**************************************************************************
     * Constructor
     **************************************************************************/
    /**
     * This constructor sets all of the member variables except for the parent
     * ID, which may be left as null/unset/empty.
     *
     * @param $argDatabaseName      The string database name
     * @param $argHostName          The string host name
     * @param $argUserName          The string user name
     */
    protected function __construct ($argDatabaseName, $argHostName,
         $argUserName) {
       $this->databaseName = $argDatabaseName;
       $this->hostName = $argHostName;
       $this->userName = $argUserName;
       
       $this->pdo = $this->openMySQLDB();
    }


    /**************************************************************************
     * Static Functions
     **************************************************************************/
    /**
     * Generates a string of question marks to be used in an IN clause with
     * the given array of values.
     *
     * @return  A string of question marks separated by commas
     */
    public static function getQuestionMarkString($an_array) {
        $qm_string = "";
        $array_size = count($an_array);
        if ($array_size == 0) {
            return "()";
        }

        $qm_string = str_repeat("?, ", $array_size - 1);
        return "($qm_string?)";
    }


    /**************************************************************************
     * Member Functions
     **************************************************************************/
    /**
     * Returns whether this object is connected to the database.
     *
     * @return  A boolean representing the connection status
     */
    public function isConnected() {
        return ! empty($this->pdo);
    }

    /**
     * Connects to the database via PDO and returns the resulting object.
     *
     * NOTE: a failure to connect results in redirection to the error page.
     *
     * @return  The PDO object if successful; null if an exception is thrown
     */
    private function openMySQLDB() {
        $pdoObject = null;
        $databasePassword = $this->getDatabasePassword();

        // This try/catch block comes from:
        // http://net.tutsplus.com/tutorials/php/php-database-access-are-you-
        // doing-it-correctly
        try {
            // Try connecting to the database via a new PDO object
            $pdoObject = new PDO("mysql:host=$this->hostName;dbname=$this->databaseName;charset=utf8", $this->userName, $databasePassword);
            $pdoObject->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch (PDOException $exception) {
            // If it fails, create an error message and redirect to the error
            // page
            $errorMessage = $exception->getMessage()." {Code: ".$exception->getCode()."}";
            SessionManager::setErrorMessage(self::ERROR_MESSAGE_CONNECTION_EXCEPTION."<hr/>".$errorMessage);
            header("Location: ".QSC_CMP_ERROR_PAGE_LINK);
            return null;
        }

        return $pdoObject;
    }

    /**
     * Prepares a query using the values given, executes it and returns the
     * boolean result.
     *
     * @param $queryStatement   The string query
     * @param $queryValues      An array with the values to prepare in the
     *                          query
     * @return                  A boolean representing the query's success
     *                          or failure
     */
    protected function performQuery($queryStatement, $queryValues = array()) {
        $pdoStatement = null;
        $result = false;

        // First, prepare the statement and handle any errors
        try {
            $pdoStatement = $this->pdo->prepare($queryStatement);
        }
        catch (PDOException $exception) {
            $error_message = self::ERROR_MESSAGE_PREPARE_QUERY."$queryStatement<hr/>".$exception->getMessage();
            SessionManager::setErrorMessage($error_message);
            qsc_core_log_and_display_error($error_message);
            return null;
        }

        // Next, attempt to execute the query and handle any errors
        try {
            $result = $pdoStatement->execute($queryValues);
            if (! $result) {
                return false;
            }
        }
        catch (PDOException $exception) {
            $error_message = self::ERROR_MESSAGE_EXECUTE_QUERY."$queryStatement<hr/>".$exception->getMessage();
            SessionManager::setErrorMessage($error_message);
            qsc_core_log_and_display_error($error_message);
            return null;
        }

        return $pdoStatement;
    }

    /**
     * Prepares a query using the values given, executes it and returns all
     * matching results. This should be used to extract multiple matches
     * from the database.
     *
     * @param $queryStatement   The string query
     * @param $queryValues      An array with the values to prepare in the
     *                          query
     * @return                  A 2D array of associative arrays (one for each
     *                          row) with field/value pairs as the keys/values
     */
    protected function getQueryResults($queryStatement, $queryValues = array()) {
        $pdoStatement = $this->performQuery($queryStatement, $queryValues);
        if (! $pdoStatement) {
            return null;
        }

        return $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Prepares a query using the values given, executes it and returns the
     * first (and presumably only) result. This should to used to extract a
     * unique match from the database.
     *
     * @param $queryStatement   The string query
     * @param $queryValues      An array with the values to prepare in the
     *                          query
     * @return                  A single associative array with field/value
     *                          pairs as the keys/values
     */
    protected function getQueryResult($queryStatement, $queryValues = array()) {
        $pdoStatement = $this->performQuery($queryStatement, $queryValues);
        if (! $pdoStatement) {
            return null;
        }

        return $pdoStatement->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Returns the entire contents of a table in the database.
     *
     * @param $tableName    The string name of the table
     * @return              A 2D array of associative arrays (one for each row)
     *                      with field/value pairs as the keys/values
     */
    protected function getTable($tableName) {
        return $this->getQueryResults("SELECT * FROM $tableName");
    }

   /**
    * Returns a single row in a table in the database with the given key/ID.
    *
    * @param $tableName     The string name of the table
    * @param $idColumn      The string name of the ID column
    * @param $value         The ID's value
    * @return               A single associative array with field/value pairs
    *                       as the keys/values
    */
   protected function getRowFromID($tableName, $idColumn, $value) {
       $query = "SELECT * FROM $tableName WHERE $idColumn = ?";

       return $this->getQueryResult($query, array($value));
   }

   /**
    * 
    * @return type
    */
    protected function getLastInsertID() {
        return $this->pdo->lastInsertId();
    }
}

/*
	public function getRowCountFromQuery ($query) {
		$res = $this->dbo->query($query);
		return getRowCountFromResult($res);
	}
*/
