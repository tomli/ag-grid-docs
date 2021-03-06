import React, {Component} from "react";

import {AgGridReact} from "ag-grid-react";
import MoodRenderer from "./MoodRenderer.jsx";
import MoodEditor from "./MoodEditor.jsx";
import NumericEditor from "./NumericEditor.jsx";

// take this line out if you do not want to use ag-Grid-Enterprise
import "ag-grid-enterprise";

export default class EditorComponentsExample extends Component {
    constructor(props) {
        super(props);

        this.state = {
            rowData: EditorComponentsExample.createRowData(),
            columnDefs: EditorComponentsExample.createColumnDefs()
        };

        this.onGridReady = this.onGridReady.bind(this);
    }

    onGridReady(params) {
        this.gridApi = params.api;
        this.columnApi = params.columnApi;

        this.gridApi.sizeColumnsToFit();
    }

    static createColumnDefs() {
        return [
            {
                headerName: "Name",
                field: "name",
                width: 300,
                editable: true,
                cellEditor: 'richSelect',
                cellEditorParams: {
                    values: [
                        "Bob",
                        "Harry",
                        "Sally",
                        "Mary",
                        "John",
                        "Jack",
                        "Sue",
                        "Sean",
                        "Niall",
                        "Albert",
                        "Fred",
                        "Jenny",
                        "Larry"
                    ]
                }
            },
            {
                headerName: "Mood",
                field: "mood",
                cellRendererFramework: MoodRenderer,
                cellEditorFramework: MoodEditor,
                editable: true,
                width: 300
            },
            {
                headerName: "Numeric",
                field: "number",
                cellEditorFramework: NumericEditor,
                editable: true,
                width: 280
            }
        ];
    }

    static createRowData() {
        return [
            {name: "Bob", mood: "Happy", number: 10},
            {name: "Harry", mood: "Sad", number: 3},
            {name: "Sally", mood: "Happy", number: 20},
            {name: "Mary", mood: "Sad", number: 5},
            {name: "John", mood: "Happy", number: 15},
            {name: "Jack", mood: "Happy", number: 25},
            {name: "Sue", mood: "Sad", number: 43},
            {name: "Sean", mood: "Sad", number: 1335},
            {name: "Niall", mood: "Happy", number: 2},
            {name: "Alberto", mood: "Happy", number: 123},
            {name: "Fred", mood: "Sad", number: 532},
            {name: "Jenny", mood: "Happy", number: 34},
            {name: "Larry", mood: "Happy", number: 13},
        ];
    }

    render() {
        return (
            <div style={{height: 370, width: 900}} className="ag-theme-fresh">
                <AgGridReact
                    // properties
                    columnDefs={this.state.columnDefs}
                    rowData={this.state.rowData}

                    // events
                    onGridReady={this.onGridReady}>
                </AgGridReact>
            </div>
        );
    }
};
