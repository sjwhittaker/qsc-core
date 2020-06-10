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
 * The abstract class BiRelationship represents a row in the database that
 * establishes a relationship between two elements via their IDs.
 *
 * NOTE: There are no get or set methods for this class. The intent is that any
 * inheriting class will obscure the generalization of 'first' and 'second'
 * with the actual columns.
 */
abstract class BiRelationship {
    /**************************************************************************
     * Member Variables
     **************************************************************************/
     protected $firstDBID = null;
     protected $secondDBID = null;
     
 
    /**************************************************************************
     * Constructor
     **************************************************************************/
    /** 
     * This constructor sets all of the member variables; none can be empty.
     *
     * @param $argFirstDBID     The ID of the 'first' element 
     * @param $argSecondDBID    The ID of the 'second' element
     */ 
     protected function __construct($argFirstDBID, $argSecondDBID) {
         $this->firstDBID = $argFirstDBID;
         $this->secondDBID = $argSecondDBID;
     }
     
}