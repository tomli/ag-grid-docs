<?php
$key = "Sorting";
$pageTitle = "ag-Grid Sorting";
$pageDescription = "ag-Grid Sorting";
$pageKeyboards = "ag-Grid Sorting";
$pageGroup = "feature";
include '../documentation-main/documentation_header.php';
?>

<div>

    <h2 id="sorting">Row Sorting</h2>

    <p>
        This page describes how to get your grid data sorting.
    </p>

    <note>
        This page discusses sorting outside of the context of paging. To see how to implement server
        side sorting, see the sections
        <a href="../javascript-grid-pagination/">pagination</a>
        and
        <a href="../javascript-grid-virtual-paging/">virtual paging</a>
    </note>

    <h3 id="enable-sorting">Enable Sorting</h3>

    <p>
        Turn sorting on for the grid by enabling sorting in the grid options.
    </p>

    <p>
        Sort a column by clicking on the column header. To do multi-column sorting,
        hold down shift while clicking the column header.
    </p>

    <h3 id="custom-sorting">Custom Sorting</h3>

    <p>
        Custom sorting is provided at a column level by configuring a comparator on the column definition.
        The sort methods gets the value as well as the row nodes.
    </p>

    <snippet>
colDef.comparator = function (valueA, valueB, nodeA, nodeB, isInverted) {
    return valueA - valueB;
}</snippet>

    <h3 id="example-custom-sorting">Example: Custom Sorting</h3>

    <p>
        Example below shows the following:
        <ul>
            <li>Default sorting on the Athlete column.</li>
            <li>When the year column is not sorted, it shows a custom icon, (up/down arrow).</li>
            <li>The date column has strings as the row data, there is custom comparator so that when you sort this column
            it sorts it as dates, not as strings.</li>
        </ul>
    </p>

    <?= example('Custom Sorting', 'custom-sorting', 'generated') ?>

    <h3 id="sorting-animation">Sorting Animation</h3>

    <p>
        To enable animation of the rows after sorting, set grid property <i>animateRows=true</i>.
    </p>

    <h3 id="sorting-order">Sorting Order</h3>

    <p>
        By default, the sorting order is as follows:
    </p>
    <p>
        <b>ascending -> descending -> none</b>.
    </p>
    <p>
        In other words, when you click a column that is not sorted, it will sort ascending. The next click
        will make it sort descending. Another click will remove the sort.
    </p>
    <p>
        It is possible to override this behaviour by providing your own <code>sortingOrder</code> on either
        the gridOptions or the colDef. If defined both in colDef and gridOptions, the colDef will get
        preference, allowing you to defined a common default, and then tailoring per column.
    </p>

    <h3 id="example-sorting-order-and-animation">Example: Sorting Order and Animation</h3>

    <p>
        The example below shows animation of the rows plus different combinations of sorting orders as follows:
        <ul>
        <li><b>Grid Default:</b> ascending -> descending -> no sort</li>
        <li><b>Column Athlete:</b> ascending -> descending</li>
        <li><b>Column Age:</b> descending -> ascending</li>
        <li><b>Column Country:</b> descending -> no sort </li>
        <li><b>Column Year:</b> ascending only</li>
    </ul>
    </p>

    <?= example('Sorting Order and Animation', 'sorting-order-and-animation', 'generated') ?>

    <h3 id="sorting-api">Sorting API</h3>

    <p>
        Sorting can be controlled via the Sorting API via the following methods:
        <ul>
        <li><b>setSortModel(sortModel):</b> To set the sort.</li>
        <li><b>getSortModel():</b> To return the state of the currently active sort.</li>
    </ul>
    </p>

    <p>
        Both methods work with a list of sort objects, each object containing a sort field
        and direction. The order of the sort objects depicts the order in which the columns
        are sorted. For example, the below array represents the model of firstly sorting
        by country ascending, and then by sport descending.
    </p>

    <snippet>
[
    {colId: 'country', sort: 'asc'},
    {colId: 'sport', sort: 'desc'}
]</snippet>

    <h3 id="example-sorting-api">Example: Sorting API</h3>

    <p>
        The example below shows the API in action.
    </p>

    <?= example('Sorting API', 'sorting-api', 'generated') ?>

    <h3 id="sorting-groups">Sorting Groups</h3>

    <p>
        The grid sorts using a default comparator for grouped columns, if you want to specify your own, you can do
        so specifying it in the colDef:
    </p>

    <snippet>
var groupColumn = {
    headerName: "Group",
    comparator: [yourOwnComparator], // this is the important bit
    cellRenderer: {
        renderer: "group",
    }
};
   </snippet>

    <h3 id="accentedSort">Accented sort</h3>

    <p>
        By default sorting doesn't take into consideration locale specific characters, if you need to make your sort locale
        specific you can configure this by setting the property <code>gridOptions.accentedSort = true</code>
    </p>

    <p>
        Using this feature is more expensive, if you need to sort a very large amount of data, you might find that this
        causes the sort to be noticeably slower.
    </p>

    <p>
        The following example is configured to use this feature.
    </p>

    <?= example('Accented Sort', 'accented-sort', 'generated') ?>
</div>

<?php include '../documentation-main/documentation_footer.php';?>