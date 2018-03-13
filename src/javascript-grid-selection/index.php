<?php
$pageTitle = "ag-Grid - Core Grid Features: Row Selection";
$pageDescription = "ag-Grid is a feature-rich data grid supporting major JavaScript Frameworks. One such feature is Row Selection. Row Selection to select rows. Choose between click selection or checkbox selection. Selecting groups will select children. Free and Commercial version available.";
$pageKeyboards = "ag-Grid Selection";
$pageGroup = "feature";
include '../documentation-main/documentation_header.php';
?>



    <h1 id="selection">Row Selection</h1>

    <p>
        Configure row selection with the following properties:
    </p>
    <ul class="content">
        <li><code>rowSelection</code>: Type of row selection, set to either <code>'single'</code> or <code>'multiple'</code> to
            enable selection. Single sets to single row selection, such that when you select a row,
            the previously selected row gets unselected. Multiple allows multiple row selection.</li>
        <li><code>rowDeselection</code>: Set to <code>true</code> or <code>false</code>. If true, then rows will be deselected if
            you hold down ctrl + click the row. Normal behaviour with the grid disallows deselection
            of nodes (ie once a node is selected, it remains selected until another row is selected
            in its place).</li>
        <li><code>suppressRowClickSelection</code>: If <code>true</code>, rows won't be selected when clicked. Use, for
            example, when you want checkbox selection, and don't want to also select when the row
            is clicked.</li>
        <li><code>isNodeSelectable</code>: a function which accept a RowNode object as parameter and return a boolean value, the
            return value of this function will decide if the row can be selected or not.</li>
    </ul>

    <p>
        When you pass data to the grid, it wraps each data item in an node. This is explained
        in the section <a href="../javascript-grid-model/">Grid Model</a>. When you query for
        the selected rows, there are two method types, ones that return nodes, and ones that
        return data items. To get the selected nodes / rows from the grid, use the following
        API methods:
    </p>
        <ul class="content">
            <li><code>api.getSelectedNodes()</code>: Returns an array of the selected nodes.</li>
            <li><code>api.getSelectedRows()</code>: Returns a array of selected rows data.</li>
        </ul>

    <p>
        Working with the ag-Grid nodes is preferred over the row data as it provide you with
        more information and maps better to the internal representation of ag-grid.
    </p>

    <h2>Example - Single Row Selection</h2>

    <p>
        The example below shows single row selection.
    </p>

    <?= example('Single Row Selection', 'single-row-selection', 'generated') ?>

    <h2>Example - Multiple Row Selection</h2>

    <p>
        The example below shows multi-row selection.
    </p>

    <?= example('Multiple Row Selection', 'multiple-row-selection', 'generated') ?>

    <h2>Example - Disable Selection On Row Level</h2>

    <p>
        The example below shows how to disable selection on row level.
    </p>

    <?= example('Disable Selection On Row Level', 'row-selection-disabling', 'generated') ?>

    <h2>Checkbox Selection</h2>

    <p>
        Checkbox selection can be used in two places: a) row selection and b) group selection.
    </p>

    <p>
        To include checkbox selection for a column, set the attribute 'checkboxSelection' to true
        on the column definition. You can set this attribute on as many columns as you like, however
        it doesn't make sense to have it in more one column in a table.
    </p>
    <p>
        To enable checkbox selection for groups, set the attribute 'checkbox' to true for the
        group renderer. See the grouping section for details on the group renderer.
    </p>
    <p>
        <code>colDef.checkboxSelection</code> can also be a function that returns true/false - use this if
        you want only checkboxes on some rows but not others. gridOptions.checkboxSelection can
        also be specified as a function - use this if you want, for example, the first column
        to have checkbox selection regardless of which column it is (you would do this by looping the columns using the
        column API, and check if the first column is the current one (in checkboxSelection).
    </p>

    <h2>Group Selection</h2>

    <p>
        When doing grouping, you control what selecting a group means. This is controlled with
        the two properties <code>groupSelectsChildren</code> and <code>groupSelectsFiltered</code>.
    </p>

    <ul class="content">
        <li><code>groupSelectsChildren</code>: When <code>true</code>, selecting a group will have the impact of
            selecting all its children. The group will then display 'selected' when all children
            are selected, 'unselected' when none are selected and 'intermediate' when children have
            a mix of selected and unselected. When the node is selecting children, it will never appear
            in the selected set when calling <code>api.getSelectedNodes()</code>.
            When <code>false</code>, then the group is selectable independently
            of the child nodes.</li> When selecting the group node independently of the children, it will
            appear in the set when calling <code>api.getSelectedNodes()</code>.
        <li><code>groupSelectsFiltered</code>: Gets used when <code>groupSelectsChildren=true</code>. When
            <code>true</code> only filtered children of the group will be selected / unselected. This means
            you can apply a filter, then try to select a group, the group will end up in the
            intermediate state as only as subset of the children will be selected.</li>
    </ul>

    <h3>Groups & Checkbox Selection Example 1</h3>

    <p>
        The example below shows checkbox selection with groups. Selecting the group has the
        effect of selecting the children. Likewise selecting all the children automatically
        selects the group. In this scenario the group itself will never appear in the <code>selectedRows</code>
        list.
    </p>

    <p>
        The example also shows a checkbox for selection on the age column. In practice, it is not
        normal to have more than two columns for selection, the below is just for demonstration.
        Having a checkbox within a non-group row is best for grids that are not using grouping.
    </p>

    <?= example('Group Selection', 'group-selection', 'generated', array("enterprise" => 1)) ?>

    <h3>Groups & Checkbox Selection Example 2 - No Select Leaf Nodes</h3>

    <p>
        The example below is similar to the previous example except it does not put checkboxes
        on the leaf level nodes, only allowing entire groups to be selected. This is achieved
        by providing functions for
        <code>colDef.checkboxSelection</code> and <code>autoGroupColumnDef.cellRendererParams.checkbox</code>.
    </p>

    <?= example('Selection Checkbox', 'selection-checkbox', 'generated', array("enterprise" => 1)) ?>

    <h3>Groups & Checkbox Selection Example 3 - Only Filtered</h3>

    <p>
        Lastly we show an example using <code>groupSelectsFiltered=true</code>. Here, when you filter
        the grid and select a group, only the filtered children get selected.
    </p>

    <p>
        To demonstrate, try this in the example:
        <ol>
        <li>Filter on swimming</li>
        <li>Select a country</li>
        <li>Notice that all filtered records get selected. If you remove the filter, the non filtered are not selected.</li>
        <li>Notice that the group becomes intermediate while all its filtered children get selected. This is because
        the selected state of the group node is independent to the filter - so it becomes intermediate as not all of its
        children are selected.</li>
    </ol>
    </p>

    <?= example('Selection Checkbox Filtered', 'selection-checkbox-filtered', 'generated', array("enterprise" => 1)) ?>

    <h2>Header Checkbox Selection</h2>

    <p>
        It is possible to have a checkbox in the header for selection. To configure the
        column to have checkbox, set <code>colDef.headerCheckboxSelection=true</code>.
        <code>headerCheckboxSelection</code> can also be a function, if you want the checkbox
        to appear sometimes (eg if the columns is ordered first in the grid).
    </p>

    <snippet>
// the name column header always has a checkbox in the header
colDef = {
    field: 'name',
    headerCheckboxSelection: true
    ...
}

// the country column header only has checkbox if it is the first column
colDef = {
    field: 'country',
    headerCheckboxSelection: function(params) {
        var displayedColumns = params.columnApi.getAllDisplayedColumns();
        var thisIsFirstColumn = displayedColumns[0] === params.column;
        return thisIsFirstColumn;
    }
    ...
}</snippet>

    <p>
        If <code>headerCheckboxSelection</code> is a function, the function will be called every
        time there is a change to the displayed columns, to check for changes.
    </p>

    <h2>Select Everything or just Filtered</h2>

    <p>
        The header checkbox has two modes of operation, 'normal' and 'filtered only'.
</p>
        <ul class="content">
            <li><b>colDef.headerCheckboxSelectionFilteredOnly=false</b>: The checkbox
            will select all rows when checked, and un-select all rows when unchecked.
            The checkbox will update its state based on all rows.</li>
            <li><b>colDef.headerCheckboxSelectionFilteredOnly=true</b>: The checkbox
            will select only filtered rows when checked and un-select only filtered
            rows when unchecked. The checkbox will update its state base on only
            filtered rows.</li>
        </ul>
    <p>
        The examples below demonstrate both of these options.
    </p>

    <h3>Header Checkbox Example 1 - Filtered Only = true</h3>

    <p>
        This example has the following characteristics:
    </p>
        <ul class="content">
            <li>The checkbox works on filtered only. That means if you filter first, then hit the checkbox to select
                or un-select, then only the filtered results get impacted.</li>
            <li>The checkbox is always on the athlete column, even if the athlete column is moved.</li>
        </ul>

    <?= example('Header Checkbox', 'header-checkbox', 'generated') ?>

    <h3>Header Checkbox Example 2 - Filtered Only = false</h3>

    <p>
        The next example is similar to the one above with the following changes:
    </p>
        <ul class="content">
        <li>The select selects everything, not just filtered.</li>
        <li>The column that the selection checkbox goes on is always the first column.
        This can be observed by dragging the columns to reorder them.</li>
    </ul>

    <?= example('Header Checkbox Entire Set', 'header-checkbox-entire-set', 'generated') ?>

    <h2>Selection Events</h2>

    <p>
        There are two events with regards selection:<br/>
    </p>
        <ul class="content">
            <li><b>rowSelected</b>: Gets called when a row is selected or deselected.
                The event contains the node in question, so call the nodes 'isSelected()'
                method to see if it was just selected or deselected.</li>
            <li><b>selectionChanged</b>: Gets called when one or more rows are
                selected or deselected. Use the grid API get a list of selected nodes
                if you want them.</li>
        </ul>

    <?= example('Selection Events', 'selection-events', 'generated') ?>

    <h2>Node Selection API</h2>

    <p>
        To select rows programmatically, use the node.setSelected() method. This method takes two
        parameters:
</p>
    <ul class="content">
        <li><b>selected</b>: set to true to select, false to un-select.</li>
        <li><b>clearSelection</b> (optional): for selection only. If true, other nodes selection will be cleared.
            Use this if you do not want multi selection and want this node to be exclusively selected.</li>
    </ul>
    <snippet>
// set selected, keep any other selections
node.setSelected(true);

// set selected, exclusively, remove any other selections
node.setSelected(true, true);

// un-select
node.setSelected(false);

// check status of node selection
var selected = node.isSelected();</snippet>

    The selected status method returns true if the node is selected, or false if it is not selected. If the
    node is a group node and the group selection is set to 'children', then this will return true if all child
    (and grand child) nodes are selected, false if all unselected, or undefined if a mixture.
    </p>

    <h2>Grid Selection API</h2>

    <p>
        The grid API has the following methods for selection:
    </p>
        <ul class="content">
        <li><code>api.selectAll()</code>: Select all rows in the grid. This is independent to filtering, it will always
        select everything regardless of filtering.</li>
        <li><code>api.deselectAll()</code>: Un-select all rows, again regardless of filtering.</li>
        <li><code>api.selectAllFiltered()</code>: Select all filtered rows in the grid.</li>
        <li><code>api.deselectAllFiltered()</code>: Un-select all filtered rows.</li>
        <li><code>api.getSelectedNodes()</code>: Returns a list of all the selected row nodes. This again is regardless
        of what filters are set.</li>
    </ul>
    <p>
        If you want to select only filtered out rows nodes, then you do this following:
        <snippet>
// loop through each node after filter
api.forEachNodeAfterFilter( function(node) {
  // select the node
  node.setSelected(true);
});</snippet>
    </p>

    <h3 id="deep-dive-example-using-for-each-node">Deep Dive Example - Using <code>forEachNode</code></h3>

    <p>
        There is an api function <code>forEachNode</code>. This is useful for doing group selections
        on a business key. The example below shows selecting all rows with country = 'United States'.
        This method is also useful when you load data and need to know the node equivalent of the
        data for selection purposes.
    </p>

    <?= example('Using forEachNode', 'using-foreachnode', 'generated') ?>

    <h2>Selection with Keyboard Arrow Keys</h2>

    <p>
        By default, you can select a row on mouse click. And you can navigate up and down the rows
        using your keyboard keys. But the selection state does not correlate with the navigation keys.
        However, we can add this behaviour using your own
        <a href="../javascript-grid-keyboard-navigation/#customNavigation">Custom Navigation</a>.
    </p>

    <p>
        First we need to provide a callback to the navigateToNextCell property in gridOptions to
        override the default arrow key navigation:
    </p>

    <snippet>
var gridOptions = {

        // ...

        navigateToNextCell: myNavigation

}</snippet>


    <p>
        From the code below you can see that we iterate over each node and call the <code>setSelected()</code>
        method if matches the current rowIndex.</p>

    <snippet>
function myNavigation(params) {

   var previousCell = params.previousCellDef;
   var suggestedNextCell = params.nextCellDef;

   var KEY_UP = 38;
   var KEY_DOWN = 40;
   var KEY_LEFT = 37;
   var KEY_RIGHT = 39;

   switch (params.key) {
       case KEY_DOWN:
           previousCell = params.previousCellDef;
           // set selected cell on current cell + 1
           gridOptions.api.forEachNode( (node) =&gt; {
               if (previousCell.rowIndex + 1 === node.rowIndex) {
                   node.setSelected(true);
               }
           });
           return suggestedNextCell;
       case KEY_UP:
           previousCell = params.previousCellDef;
           // set selected cell on current cell - 1
           gridOptions.api.forEachNode( (node) =&gt; {
               if (previousCell.rowIndex - 1 === node.rowIndex) {
                   node.setSelected(true);
               }
           });
           return suggestedNextCell;
       case KEY_LEFT:
       case KEY_RIGHT:
           return suggestedNextCell;
       default:
           throw "this will never happen, navigation is always on of the 4 keys above";
   }
}</snippet>

    <?= example('Selection with Keyboard Arrow Keys', 'selection-with-arrow-keys') ?>



<?php include '../documentation-main/documentation_footer.php';?>
