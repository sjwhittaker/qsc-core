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
 * You can `define` any constant here in `config.php` instead to change the
 * value.
 ***************************************************************************/
qsc_core_define_constant("QSC_CORE_QUERY_STRING_NAME_ID", "id");

qsc_core_define_constant("QSC_CORE_STRING_SNIPPET_LENGTH_STANDARD", 100);
qsc_core_define_constant("QSC_CORE_STRING_SNIPPET_LENGTH_SHORT", 60);
qsc_core_define_constant("QSC_CORE_STRING_SNIPPET_LENGTH_HEADING", 40);

qsc_core_define_constant("QSC_CORE_DATE_FORMAT", "Y-m-d");
qsc_core_define_constant("QSC_CORE_DATE_AND_TIME_FORMAT", QSC_CORE_DATE_FORMAT." H:i:s");

qsc_core_define_constant("QSC_CORE_LOG_PREFIX_ERROR", '--- Error --- ');
qsc_core_define_constant("QSC_CORE_LOG_PREFIX_WARNING", '--- Warning --- ');
qsc_core_define_constant("QSC_CORE_MESSAGE_TYPE_ERROR", 'error');
qsc_core_define_constant("QSC_CORE_MESSAGE_TYPE_WARNING", 'warning');
qsc_core_define_constant("QSC_CORE_MESSAGE_TYPE_SUCCESS", 'success');

