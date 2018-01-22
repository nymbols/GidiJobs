<?php 
/*
 * GidiJobs
 * Companies Datagrid
 *
 * GidiJobs Version: 0.9.4 Countach
 *
*
 *
 *
 *
 *
 *
 * Software distributed under the License is
 * distributed on an "AS IS" basis, WITHOUT WARRANTY OF ANY KIND, either
 * express or implied. See the License for the specific language governing
 * rights and limitations under the License.
 *
 *
 *
 *
 *
 *
 *
 *
 *
 *
 *
 *
 *
 * $Id: dataGrids.php 3096 2007-09-25 19:27:04Z brian $
 */
 
include_once('./lib/Companies.php');
include_once('./lib/Hooks.php');
include_once('./lib/Width.php');

class CompaniesListByViewDataGrid extends CompaniesDataGrid
{
    public function __construct($siteID, $parameters, $misc)
    {
        /* Pager configuration. */
        $this->_tableWidth = new Width(100, '%');
        $this->_defaultAlphabeticalSortBy = 'name';
        $this->ajaxMode = false;
        $this->showExportCheckboxes = true; //BOXES WILL NOT APPEAR UNLESS SQL ROW exportID IS RETURNED!
        $this->showActionArea = true;
        $this->showChooseColumnsBox = true;
        $this->allowResizing = true;

        $this->defaultSortBy = 'dateCreatedSort';
        $this->defaultSortDirection = 'DESC';
   
        $this->_defaultColumns = array( 
            array('name' => 'Attachments', 'width' => 10),
            array('name' => 'Name', 'width' => 255),
            array('name' => 'Jobs', 'width' => 40),
            array('name' => 'City', 'width' => 90),
            array('name' => 'State', 'width' => 50),
            array('name' => 'Phone', 'width' => 85),
            array('name' => 'Owner', 'width' => 65),
            array('name' => 'Created', 'width' => 60),
            array('name' => 'Modified', 'width' => 60),
        );
   
        parent::__construct("companies:CompaniesListByViewDataGrid", 
                             $siteID, $parameters, $misc
                        );
    }
    

    /**
     * Adds more options to the action area on the pager.  Overloads 
     * DataGrid Inner Action Area function.
     *
     * @return html innerActionArea commands.
     */    
    public function getInnerActionArea()
    {
        //TODO: Add items:
        //  - Add to List
        //  - Add to Pipeline
        //  - Mass set rank (depends on each candidate having their own personal rank - are we going to do this?)
        $html = '';

        $html .= $this->getInnerActionAreaItemPopup('Add To List', CATSUtility::getIndexName().'?m=lists&amp;a=addToListFromDatagridModal&amp;dataItemType='.DATA_ITEM_COMPANY, 450, 350);
        $html .= $this->getInnerActionAreaItem('Export', CATSUtility::getIndexName().'?m=export&amp;a=exportByDataGrid');

        $html .= parent::getInnerActionArea();

        return $html;
    }
}

class companiesSavedListByViewDataGrid extends CompaniesDataGrid
{
    public function __construct($siteID, $parameters, $misc)
    {
        /* Pager configuration. */
        $this->_tableWidth = new Width(100, '%');
        $this->_defaultAlphabeticalSortBy = 'name';
        $this->ajaxMode = false;
        $this->showExportCheckboxes = true; //BOXES WILL NOT APPEAR UNLESS SQL ROW exportID IS RETURNED!
        $this->showActionArea = true;
        $this->showChooseColumnsBox = true;
        $this->allowResizing = true;

        $this->defaultSortBy = 'dateCreatedSort';
        $this->defaultSortDirection = 'DESC';
   
        $this->_defaultColumns = array( 
            array('name' => 'Attachments', 'width' => 10),
            array('name' => 'Name', 'width' => 255),
            array('name' => 'Jobs', 'width' => 40),
            array('name' => 'City', 'width' => 90),
            array('name' => 'State', 'width' => 50),
            array('name' => 'Phone', 'width' => 85),
            array('name' => 'Owner', 'width' => 65),
            array('name' => 'Created', 'width' => 60),
            array('name' => 'Modified', 'width' => 60),
        );
   
        parent::__construct("companies:companiesSavedListByViewDataGrid", 
                             $siteID, $parameters, $misc
                        );
    }
    

    /**
     * Adds more options to the action area on the pager.  Overloads 
     * DataGrid Inner Action Area function.
     *
     * @return html innerActionArea commands.
     */    
    public function getInnerActionArea()
    {
        //TODO: Add items:
        //  - Add to List
        //  - Add to Pipeline
        //  - Mass set rank (depends on each candidate having their own personal rank - are we going to do this?)
        $html = '';

        $html .= $this->getInnerActionAreaItem('Remove From This List', CATSUtility::getIndexName().'?m=lists&amp;a=removeFromListDatagrid&amp;dataItemType='.DATA_ITEM_COMPANY.'&amp;savedListID='.$this->getMiscArgument(), false);
        $html .= $this->getInnerActionAreaItem('Export', CATSUtility::getIndexName().'?m=export&amp;a=exportByDataGrid');

        $html .= parent::getInnerActionArea();

        return $html;
    }
}

?>