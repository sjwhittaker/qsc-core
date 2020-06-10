<?php
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


/****************************************************************************
 * Defining Constants
 ***************************************************************************/
/**
 * This function defines a constant only if it's not already defined.
 *
 * @param $constant_name    The string name of the constant
 * @param $constant_value   The value of the constant
 */
function qsc_core_define_constant($constant_name, $constant_value) {
    if (! defined($constant_name)) {
        define($constant_name, $constant_value);        
    }
}


/****************************************************************************
 * File System Constants - Most Likely to Change
 * Please edit these directly. 
 ***************************************************************************/
qsc_core_define_constant("QSC_CORE_DOCUMENT_ROOT", filter_input(INPUT_SERVER, "DOCUMENT_ROOT", FILTER_SANITIZE_URL));

qsc_core_define_constant("QSC_CORE_DIRECTORY_LINK", "/qsc-core");
qsc_core_define_constant("QSC_CORE_DIRECTORY_PATH", QSC_CMP_DOCUMENT_ROOT.QSC_CORE_DIRECTORY_LINK);

qsc_core_define_constant("QSC_CORE_SRC_DIRECTORY_PATH", QSC_CORE_DIRECTORY_PATH."/src");
qsc_core_define_constant("QSC_CORE_SRC_MANAGERS_DIRECTORY_PATH", QSC_CORE_SRC_DIRECTORY_PATH."/Managers");
qsc_core_define_constant("QSC_CORE_SRC_DATABASE_OBJECTS_DIRECTORY_PATH", QSC_CORE_SRC_DIRECTORY_PATH."/DatabaseObjects");

qsc_core_define_constant("QSC_CORE_CSS_DIRECTORY_LINK", QSC_CORE_DIRECTORY_LINK."/css");

qsc_core_define_constant("QSC_CORE_JS_DIRECTORY_LINK", QSC_CORE_DIRECTORY_LINK."/js");
qsc_core_define_constant("QSC_CORE_JQUERY_LINK", QSC_CORE_JS_DIRECTORY_LINK."/jquery-3.4.1.min.js");


/****************************************************************************
 * Include Standard Constants
 ***************************************************************************/
include_once(QSC_CORE_DIRECTORY_PATH.'/constants.php');


/****************************************************************************
 * Include Standard Functions
 ***************************************************************************/
include_once(QSC_CORE_DIRECTORY_PATH.'/functions.php');
include_once(QSC_CORE_DIRECTORY_PATH.'/html.php');
include_once(QSC_CORE_DIRECTORY_PATH.'/forms.php');


/****************************************************************************
 * Include All Database-Related Classes
 ***************************************************************************/
include_once(QSC_CORE_SRC_DATABASE_OBJECTS_DIRECTORY_PATH.'/DatabaseObject.php');
include_once(QSC_CORE_SRC_DATABASE_OBJECTS_DIRECTORY_PATH.'/BiRelationship.php');

include_once(QSC_CORE_SRC_MANAGERS_DIRECTORY_PATH.'/DatabaseManager.php');
include_once(QSC_CORE_SRC_MANAGERS_DIRECTORY_PATH.'/SubsetManager.php');
