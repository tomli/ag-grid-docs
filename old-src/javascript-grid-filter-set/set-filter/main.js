function irishAthletes() {
    return [
        'John Joe Nevin',
        'Katie Taylor',
        'Paddy Barnes',
        'Kenny Egan',
        'Darren Sutherland',
        'Margaret Thatcher',
        'Tony Blair',
        'Ronald Regan',
        'Barack Obama'
    ];
};

var columnDefs = [
    {
        headerName: 'Athlete',
        field: 'athlete',
        width: 150,
        filter: 'set',
        filterParams: {cellHeight: 20, values: irishAthletes(), debounceMs: 1000}
    },
    {headerName: 'Age', field: 'age', width: 90, filter: 'number'},
    {
        headerName: 'Country',
        field: 'country',
        width: 140,
        cellRenderer: countryCellRenderer,
        keyCreator: countryKeyCreator,
        filter: 'set',
        filterParams: {selectAllOnMiniFilter: true}
    },
    {headerName: 'Year', field: 'year', width: 90},
    {headerName: 'Date', field: 'date', width: 110},
    {headerName: 'Sport', field: 'sport', width: 110, filter: 'set', filterParams: {suppressMiniFilter: true}},
    {headerName: 'Gold', field: 'gold', width: 100, filter: 'number'},
    {headerName: 'Silver', field: 'silver', width: 100, filter: 'number'},
    {headerName: 'Bronze', field: 'bronze', width: 100, filter: 'number'},
    {headerName: 'Total', field: 'total', width: 100, filter: 'number'}
];

var gridOptions = {
    columnDefs: columnDefs,
    rowData: null,
    enableFilter: true,
    enableColResize: true,
    floatingFilter: true
};

function countryCellRenderer(params) {
    return params.value.name + ' (' + params.value.code + ')';
}

function countryKeyCreator(params) {
    var countryObject = params.value;
    var key = countryObject.name;
    return key;
}

function onFilterChanged(value) {
    gridOptions.api.setQuickFilter(value);
}

function patchData(data) {
    // hack the data, replace each country with an object of country name and code
    data.forEach(function(row) {
        var countryName = row.country;
        var countryCode = countryName.substring(0, 2).toUpperCase();
        row.country = {
            name: countryName,
            code: countryCode
        };
    });
}

// setup the grid after the page has finished loading
document.addEventListener('DOMContentLoaded', function() {
    var gridDiv = document.querySelector('#myGrid');
    new agGrid.Grid(gridDiv, gridOptions);

    agGrid.simpleHttpRequest({url: 'https://raw.githubusercontent.com/ag-grid/ag-grid-docs/master/src/olympicWinnersSmall.json'}).then(function(data) {
        patchData(data);
        gridOptions.api.setRowData(data);
    });
});
