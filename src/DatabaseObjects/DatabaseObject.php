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
 * The abstract class DatabaseObject contains elements and functionality 
 * common to all objects in the database, which is essentially the primary key
 * or 'ID'.
 */
abstract class DatabaseObject {
    /**************************************************************************
     * Constants                
     **************************************************************************/    
    public const NEW_OBJECT_TEMP_ID = "0";         
    
    
    /**************************************************************************
     * Member Variables
     **************************************************************************/
     protected $dbID = null;

     
    /**************************************************************************
     * Static Functions
     **************************************************************************/
    /** 
     * This is intended for use by inherited classes with properties that
     * may be null. It provides an option for returning an alternative to null.
     * For example, the string 'None' could be used when requesting a value
     * to display to the user.
     *
     * @param $value           The value to text
     * @param $noneOption      The substitute value for null (default of null)
     * @return                 The value if it's not null; the noneOption
     *                         otherwise
     */
     protected static function getNoneIfEmpty($value, $noneOption = null) {
         return ($value ? $value : $noneOption);
     }
     
 
    /**************************************************************************
     * Constructor
     **************************************************************************/
    /** 
     * This constructor sets the ID member variable.
     *
     * @param $argDBID         The integer or string ID
     */ 
     protected function __construct($argDBID) {
         $this->dbID = $argDBID;
     }

     
    /**************************************************************************
     * Get and Set Methods
     **************************************************************************/
    /** 
     * The get method for the object's ID in the database.
     *
     * @return      The string or numeric database ID
     */ 
     public function getDBID() {
        return $this->dbID;   
     }
     
          
    /**************************************************************************
     * Member Functions
     **************************************************************************/
    /**  
     * Creates a URL that containing a query string with a numeric or string
     * identifier. It's intended to create links to 'View ...' pages.
     *
     * @param $link     A string URL without a query string
     * @return          A string URL complete with a query string
     */     
    protected function getLinkWithID($link) {
        return qsc_core_create_link_with_id($link, $this->dbID);
    }
 
}