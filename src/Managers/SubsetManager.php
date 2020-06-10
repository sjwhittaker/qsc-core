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

class SubsetManager {
    /**************************************************************************
     * Constants
     **************************************************************************/
    public const ELEMENT_VALUE_FUNCTION = "ELEMENT_VALUE_FUNCTION";

    public const SUBSET_MINIMUM_VALUE = "SUBSET_MINIMUM_VALUE";
    public const SUBSET_MAXIMUM_VALUE = "SUBSET_MAXIMUM_VALUE";
    public const SUBSET_STOP_VALUE = "SUBSET_STOP_VALUE";

    public const MAXIMUM_RECURSIVE_CALLS = "MAXIMUM_RECURSIVE_CALLS";

    public const ADD_SUBSETS_TYPE_APPEND = "ADD_SUBSETS_TYPE_APPEND";
    public const ADD_SUBSETS_TYPE_PREPEND = "ADD_SUBSETS_TYPE_PREPEND";
    public const ADD_SUBSETS_TYPE_CARTESIAN_PRODUCT = "ADD_SUBSETS_TYPE_CARTESIAN_PRODUCT";
    public const ADD_SUBSETS_TYPE_CARTESIAN_PRODUCT_PLUS_SUBSETS = "ADD_SUBSETS_TYPE_CARTESIAN_PRODUCT_PLUS_SUBSETS";
    
    
    /**************************************************************************
     * Member Variables
     **************************************************************************/
    protected $subsetArray = array();

    protected $elementArray = array();
    
    protected $elementValueFunction = null;
    
    protected $subsetMinimumValue = false;
    protected $subsetMaximumValue = false;
    protected $subsetStopValue = false;
    
    protected $numberOfRecursiveCalls = 0;
    protected $maximumRecursiveCalls = false;
    
    protected $debug = false;

    
    /**************************************************************************
     * Constructor
     **************************************************************************/
    /**
     * 
     * @param type $argElementArray
     * @param type $argOptionArray
     */
    public function __construct($argElementArray = array(), $argOptionArray = array()) {
        $this->elementArray = qsc_core_clone_array($argElementArray);
        
        foreach ($argOptionArray as $key => $value) {
            switch ($key) {
                case self::ELEMENT_VALUE_FUNCTION :
                    $this->elementValueFunction = $value;
                    break;
                case self::SUBSET_MINIMUM_VALUE :
                    $this->subsetMinimumValue = $value;
                    break;
                case self::SUBSET_MAXIMUM_VALUE :
                    $this->subsetMaximumValue = $value;
                    break;
                case self::SUBSET_STOP_VALUE :
                    $this->subsetStopValue = $value;
                    break;
                case self::MAXIMUM_RECURSIVE_CALLS :
                    $this->maximumRecursiveCalls = $value;
                    break;
            }
        }
        
        $this->determineSubsets();
    }

    
    /**************************************************************************
     * Get and Set Methods
     **************************************************************************/
    /**
     * 
     * @return type
     */
    public function getSubsetArray() {
        return qsc_core_clone_array($this->subsetArray);
    }
    
    /**
     * 
     * @return type
     */
    public function hasElementValueFunction() {
        return is_callable($this->elementValueFunction);
    }
        
    /**
     * 
     * @return type
     */
    public function hasMinimumValue() {
        return $this->subsetMinimumValue !== false;
    }
    
    /**
     * 
     * @return type
     */
    public function hasMaximumValue() {
        return $this->subsetMaximumValue !== false;
    }
    
    /**
     * 
     * @return type
     */
    public function hasMaximumRecursiveCalls() {
        return $this->maximumRecursiveCalls !== false;
    }    
    

    /**
     * 
     * @return type
     */
    public function hasStopValue() {
        return $this->subsetStopValue !== false;
    }
    
    /**
     * 
     * @return type
     */
    public function maximumRecursiveCallsMade() {
        return $this->hasMaximumRecursiveCalls() && 
            ($this->numberOfRecursiveCalls >= $this->maximumRecursiveCalls);
    }
    
    /**
     * 
     * @return type
     */
    public function getNumberOfRecursiveCalls() {
        return $this->numberOfRecursiveCalls;
    }
    
    
    /**************************************************************************
     * Member Functions
     **************************************************************************/ 
    /**
     * 
     * @param type $element
     * @return type
     */
    protected function applyValueFunction($element) {
        return $this->hasElementValueFunction() ?
            ($this->elementValueFunction)($element) : 0;   
    }
    
    /**
     * 
     * @param type $value
     * @return boolean
     */
    protected function stopAtValue($value) {
        if (! ($this->hasElementValueFunction() && $this->hasStopValue())) {
            return false;
        }
        
        return $value >= $this->subsetStopValue;        
    }
    
    /**
     * 
     * @param type $value
     * @return type
     */
    protected function valueSatisfiesMinimum($value) {
        return $this->hasMinimumValue() ? 
            $value >= $this->subsetMinimumValue : true;        
    }    
    
    /**
     * 
     * @param type $value
     * @return type
     */
    protected function valueMeetsMaximum($value) {
        return $this->hasMaximumValue() ? 
            $value == $this->subsetMaximumValue : false;        
    }        
    
    /**
     * 
     * @param type $value
     * @return type
     */
    protected function valueExceedsMaximum($value) {
        return $this->hasMaximumValue() ? 
            $value > $this->subsetMaximumValue : false;        
    }        
    
    /**
     * 
     * @param type $element
     * @return type
     */
    protected function elementExceedsMaximum($element) {
        return $this->hasElementValueFunction() ?
            $this->valueExceedsMaximum($this->applyValueFunction($element)) :
            false;        
    }     
            
    /**
     * 
     */
    protected function determineSubsets() {        
        // Perform the recursion
        $resultSubsetArray = $this->determineSubsetsRecursive(                
            $this->elementArray, 0);
        
        // Check the result
        if (! is_array($resultSubsetArray)) {
            // If there was a problem, just go with an empty array
            $this->subsetArray = array();
        }
        elseif ($this->hasElementValueFunction() && $this->hasMinimumValue()) {
            // If there's a minimum value, go through the results and only
            // take the subsets that meet the requirement
            foreach ($resultSubsetArray as $resultSubset) {
                $totalValue = array_sum(array_map($this->elementValueFunction,
                    $resultSubset));
                
                if ($this->valueSatisfiesMinimum($totalValue)) {
                    $this->subsetArray[] = $resultSubset;
                }
            }
        }
        else {
            // Otherwise, the return value is great as-is
            $this->subsetArray = $resultSubsetArray;
        }
    }
    
    /**
     * 
     * @param type $currentArray
     * @param type $currentValue
     * @return type
     */
    protected function determineSubsetsRecursive($currentArray, $currentValue) {
        $resultSubsetArray = array();
        $computeArray = qsc_core_clone_array($currentArray);
        
        // Increment the number of recursive calls
        $this->numberOfRecursiveCalls++;
        
        if ($this->debug) : ?>
        <ul>
            <li>Starting function call with value <?php print_r($currentValue); ?></li>
            <li>Current array: <?php print_r($currentArray); ?></li>
        <?php endif;
        
        // Test the conditions to cease the recursion
        if ($this->valueExceedsMaximum($currentValue)) {
            // Has the maximum value been exceeded? If so, return null to signify
            // that this subset shouldn't be included.
            if ($this->debug) : ?>
                <li>Maximum value exceeded: <?php print_r($currentValue); ?></li>
                <li>Returning null</li>
                </ul>
            <?php endif;            
            return null;
        }
        elseif ($this->stopAtValue($currentValue) || $this->valueMeetsMaximum($currentValue)) {
            // If either the stop or maximum requirement was met, return an 
            // empty array as a subset so the previous element can add 
            // itself recursively.
            if ($this->debug) : ?>
                <li>Stop value met: <?php print_r($currentValue); ?></li>
                <li>Returning: <?php print_r(array(array())); ?> </li>
                </ul>
            <?php endif;            
            return array();
        }
        elseif ($this->maximumRecursiveCallsMade()) {
            // Has the maximum number of recursive calls been made? If so, 
            // return null to cut off the recursion.
            if ($this->debug) : ?>
                <li>Maximum number of recursive calls made: <?= $this->numberOfRecursiveCalls ?></li>
                <li>Returning null</li>
                </ul>
            <?php endif;            
            return null;            
        }        
                
        // Continue the recursion by going through the elements one by one
        foreach ($computeArray as $key => $currentElement) {            
            // Remove the current element from exploration
            unset($computeArray[$key]);
            
            if ($this->debug) : ?>
                <li>Current element: <?php print_r($currentElement); ?></li>
            <?php endif;
                        
            // Determine the value of the current element (if defined)
            $currentElementValue = $this->hasElementValueFunction() ? 
                $this->applyValueFunction($currentElement) : 0;       

            // Do the recursion to get all other subsets
            if ($this->debug) : ?>
                <li>Doing recursion ...
            <?php
            endif;
            
            $recursiveSubsetArray = $this->determineSubsetsRecursive($computeArray, 
                $currentValue + $currentElementValue);
                        
            if ($this->debug) : ?>
                </li>
                <li>Results from recursion: <?php print_r($recursiveSubsetArray); ?></li>
            <?php endif;
                        
            // Check the recursive results; only merge the current element if
            // the results are in an array
            if (is_array($recursiveSubsetArray))  {
                // Add this current element as a subset
                if ($this->debug) : ?>
                    <li>Adding single element: <?php print_r(array($currentElement)); ?></li>
                <?php endif;
                $resultSubsetArray[] = array($currentElement);
            
                // Prepend the current element to each of the recursive results
                foreach ($recursiveSubsetArray as $subset) {
                    array_unshift($subset, $currentElement);
                    $resultSubsetArray[] = $subset;
                }
                
                if ($this->debug) : ?>
                    <li>Subsets after merge: <?php print_r($resultSubsetArray); ?></li>
                <?php endif;          
            }

            // Has the maximum number of recursive calls been made?
            if ($this->maximumRecursiveCallsMade()) {
                // If so, break out of the loop and just return what's been
                // discovered thus far.
                if ($this->debug) : ?>
                    <li>Maximum number of recursive calls made: <?= $this->numberOfRecursiveCalls ?></li>
                    <li>Breaking out of loop</li>
                <?php endif;            
                break;
            }
        }            
                
        if ($this->debug) :
        ?>
        </ul>
        <?php            
        endif;
        
        return $resultSubsetArray;        
    }    
    
    /**
     * 
     * @param type $otherSubsetManager
     * @param type $mergeType
     */
    public function addSubsetsFromSubsetManager($otherSubsetManager, 
        $mergeType = self::ADD_SUBSETS_TYPE_APPEND) {
                    
        // Get the other subsets and add the number of recursive calls
        $otherSubsetArray = $otherSubsetManager->getSubsetArray();
        $this->numberOfRecursiveCalls += $otherSubsetManager->getNumberOfRecursiveCalls();
        
        // Add the other subsets
        $this->addSubsetsFromArray($otherSubsetArray, $mergeType);
    }
    
    /**
     * 
     * @param type $otherSubsetArray
     * @param type $mergeType
     * @return type
     */
    public function addSubsetsFromArray($otherSubsetArray,
        $mergeType = self::ADD_SUBSETS_TYPE_APPEND) {
        
        // Check whether there are subsets in here and the array first
        if (empty($otherSubsetArray)) {
            // Nothing in the array? Don't touch anything in here
            return;
        }
        elseif (empty($this->subsetArray)) {
            // Nothing in here? Add the elements from the other array
            $this->subsetArray = $otherSubsetArray;
            return;
        }

        // Check the merge type
        if (($mergeType == self::ADD_SUBSETS_TYPE_CARTESIAN_PRODUCT) || 
            ($mergeType == self::ADD_SUBSETS_TYPE_CARTESIAN_PRODUCT_PLUS_SUBSETS)) {
            // Save the original subset array
            $originalSubsetArray = qsc_core_clone_array($this->subsetArray);

            // Check the type
            if ($mergeType == self::ADD_SUBSETS_TYPE_CARTESIAN_PRODUCT) {
                // This is pure Cartesian product; clear the prior subsets
                // for the new result
                $this->subsetArray = array();
            }
            else {
                // Keep these subsets and append the others
                $this->subsetArray = array_merge($this->subsetArray, $otherSubsetArray); 
            }
                        
            // Apply Cartesian product to the two sets of subsets and
            // add the merged values to the result.
            foreach ($originalSubsetArray as $originalSubset) {
                foreach ($otherSubsetArray as $otherSubset) {
                    // Create the new subset
                    $productSubset = array_merge($originalSubset, $otherSubset);

                    // Get the total value of the subset (if necessary)
                    $totalValue = $this->hasMaximumValue() ?
                        array_sum(array_map($this->elementValueFunction, $productSubset)) : 0;
                    
                        // Ad the product if it doesn't exceed the maximum value
                    if  (! $this->valueExceedsMaximum($totalValue)) {
                        $this->subsetArray[] = $productSubset;
                    }
                }
            }                           
        }
        elseif ($mergeType == self::ADD_SUBSETS_TYPE_PREPEND) {
            // Prepend the other subsets
            $this->subsetArray = array_merge($otherSubsetArray, $this->subsetArray); 
        }
        else {
            // Append the other subsets
            $this->subsetArray = array_merge($this->subsetArray, $otherSubsetArray); 
        }        
    }
    
    /**
     * 
     * @param type $minValue
     * @return type
     */
    public function applyMinimumValue($minValue = false) {
        $filteredSubsetArray = array();
        
        if (! $this->hasElementValueFunction()) {
            return;
        }
        
        // Replace the minimum value, if provided
        if ($minValue !== false) {
            $this->subsetMinimumValue = $minValue;
        }

        // Go through each subset and only keep the ones that meet or 
        // exceed the minimum
        foreach ($this->subsetArray as $subset) {
            // Get the total value of the subset
            $totalValue = array_sum(
                array_map($this->elementValueFunction, $subset));
                    
            // Add the subset if it meets the minimum
            if  ($this->valueSatisfiesMinimum($totalValue)) {
                $filteredSubsetArray[] = $subset;
            }
        }
        
        $this->subsetArray = $filteredSubsetArray;        
    }
}
