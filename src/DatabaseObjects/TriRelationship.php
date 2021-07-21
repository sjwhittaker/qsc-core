<?php
namespace DatabaseObjects;

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

/** 
 * The abstract class TriRelationship represents a row in the database that
 * establishes a relationship between three elements via their IDs.
 *
 * NOTE: There are no get or set methods for this class. The intent is that any
 * inheriting class will obscure the generalization of 'first', 'second' and
 * 'third' with the actual columns.
 */
abstract class TriRelationship {
    /**************************************************************************
     * Member Variables
     **************************************************************************/
    protected $firstDBID = null;
    protected $secondDBID = null;
    protected $thirdDBID = null;
     
     
    /**************************************************************************
     * Static Functions
     **************************************************************************/
    /**
     * This function uses the values in a database row (i.e., an associative
     * array) to create a new relationship object and set the values of the member 
     * variables. It must be implemented by all descendants to handle their
     * specific needs.
     *
     * @param $dbRowArray        The row from the database
     */
    public abstract static function buildFromDBRow($dbRowArray);
    
    /**
     * Returns a sorting function to be used by sort(...) and its variants
     * with DatabaseObjects. This is intended as a default; any class that
     * extends this one can define a custom version.  
     * 
     * @return type
     */
    public static function getSortFunction() {
        return function($a, $b) { 
                return ($a->firstDBID == $b->firstDBID) ?
                    (($a->secondDBID == $b->thirdDBID) ? ($a->thirdDBID < $b->thirdDBID) : ($a->secondDBID < $b->secondDBID)) :
                    ($a->firstDBID < $b->firstDBID);
            };        
    }

    /**
     * Returns whether initialization affects the object's properties such 
     * that a DB query's ORDER BY is rendered redundant and re-sorting 
     * using getSortFunction() is required. This is considered the exception
     * and not the rule, so the default is false.
     * 
     * @return boolean
     */
    public static function sortAfterInitialization() {
        return false;
    }
        
     
    /**************************************************************************
     * Constructor
     **************************************************************************/
    /** 
     * This constructor sets all of the member variables; none can be empty.
     *
     * @param $argFirstDBID     The ID of the 'first' element 
     * @param $argSecondDBID    The ID of the 'second' element
     * @param $argThirdDBID     The ID of the 'third' element
     */ 
    protected function __construct($argFirstDBID, $argSecondDBID, $argThirdDBID) {
        $this->firstDBID = $argFirstDBID;
        $this->secondDBID = $argSecondDBID;
        $this->thirdDBID = $argThirdDBID;
    }

    
    /*************************************************************************
     * Initialize
     *************************************************************************/
    /**
     * Some relationships may be too complicated to be properly 'initialized'
     * in the constructor. This function is a placeholder for descendants
     * to override *if* they need to query the DatabaseManager to complete
     * themselves.
     * 
     * This function should be called in conjunction with the constructor or
     * buildFromDBRow(...) to create and initialize relationship objects.
     * 
     * @param type $dbManager
     * @param type $argArray
     */
    public function initialize($dbManager, $argArray = array()) {
    }     
    
}