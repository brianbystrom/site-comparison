

var TableAdvanced = function () {

    var initTable3 = function () {
        var table = $('#sample_3');

        /* Formatting function for row details */
        function fnFormatDetails(oTable, nTr) {
            var aData = oTable.fnGetData(nTr);
            var tArray = [];
            var sOut = '';
            var pdate = table.find("#pdate").html();
            var csite = table.find("#csite").html();
            var site = table.find("#site").html();
            var survey = $("#survey_read").find("#surveys").html();
        
            var surveys = survey.split(' ');

            var surveys = surveys[2];

            //var regExp = /\(([^)]+)\)/;
            //var cid = regExp.exec(name);

               $.ajax({
                  async: false,
                  url: '../../../chat_scripts/table_level3.php',
                  type: 'post',
                  data: { item: aData[1].replace(/&amp;/g, '&'),
                            pdate: pdate,
                            site: name,
                            csite: csite,
                            surveys: surveys},
                    dataType: 'json',
                  success: function(data, status) { 
                      
                      sOut = data;
                      

                    }
                   
                });

               alert(sOut);

               sOut.forEach(function(value) {
                         tArray.push(value);
              });

            return tArray;
        }

        /*
         * Insert a 'details' column to the table
         */
        var nCloneTh = document.createElement('th');
        nCloneTh.className = "table-checkbox";

        var nCloneTd = document.createElement('td');
        nCloneTd.innerHTML = '<span class="row-details row-details-close"></span>';

        table.find('thead tr').each(function () {
            this.insertBefore(nCloneTh, this.childNodes[0]);
        });

        table.find('tbody tr').each(function () {
            this.insertBefore(nCloneTd.cloneNode(true), this.childNodes[0]);
        });

        /*
         * Initialize DataTables, with no sorting on the 'details' column
         */
        var oTable = table.dataTable({

            // Internationalisation. For more info refer to http://datatables.net/manual/i18n
            "language": {
                "aria": {
                    "sortAscending": ": activate to sort column ascending",
                    "sortDescending": ": activate to sort column descending"
                },
                "emptyTable": "No data available in table",
                "info": "Showing _START_ to _END_ of _TOTAL_ entries",
                "infoEmpty": "No entries found",
                "infoFiltered": "(filtered1 from _MAX_ total entries)",
                "lengthMenu": "Show _MENU_ entries",
                "search": "Search:",
                "zeroRecords": "No matching records found"
            },

            "columnDefs": [{
                "orderable": false,
                "targets": [0,17]
            }],
            "order": [
                [2, 'desc']
            ],
            "lengthMenu": [
                [5, 15, 20, -1],
                [5, 15, 20, "All"] // change per page values here
            ],
            // set the initial value
            "pageLength": 20,
        });
        var tableWrapper = $('#sample_3_wrapper'); // datatable creates the table wrapper by adding with id {your_table_jd}_wrapper

        tableWrapper.find('.dataTables_length select').select2(); // initialize select2 dropdown

        /* Add event listener for opening and closing details
         * Note that the indicator for showing which row is open is not controlled by DataTables,
         * rather it is done here
         */
        table.on('click', ' tbody td .row-details', function () {
            var nTr = $(this).parents('tr')[0];
            if (oTable.fnIsOpen(nTr)) {
                /* This row is already open - close it */
                $(this).addClass("row-details-close").removeClass("row-details-open");
                oTable.fnClose(nTr);
            } else {
                /* Open this row */
                $(this).addClass("row-details-open").removeClass("row-details-close");
                oTable.fnOpen(nTr, fnFormatDetails(oTable, nTr), '');
            }
        });
    }

    var initTable1 = function () {
        var table = $('#sample_1');

        /* Formatting function for row details */
        function fnFormatDetails(oTable, nTr) {
            var aData = oTable.fnGetData(nTr);
            var tArray = [];
            var sOut = '';
            var pdate = table.find("#pdate").html();
            var csite = table.find("#csite").html();
            var site = table.find("#site").html();
            var survey = $("#survey_read").find("#surveys").html();
        
            var surveys = survey.split(' ');

            var surveys = surveys[2];

            //var regExp = /\(([^)]+)\)/;
            //var cid = regExp.exec(name);

               $.ajax({
                  async: false,
                  url: '../../scripts/table_level3.php',
                  type: 'post',
                  data: { item: aData[1].replace(/&amp;/g, '&'),
                            pdate: pdate,
                            site: site,
                            csite: csite,
                            surveys: surveys},
                    dataType: 'json',
                  success: function(data, status) { 
                      
                      sOut = data;

                    }
                   
                });

               sOut.forEach(function(value) {
                         tArray.push(value);
              });

            return tArray;
        }

        /*
         * Insert a 'details' column to the table
         */
        var nCloneTh = document.createElement('th');
        nCloneTh.className = "table-checkbox";

        var nCloneTd = document.createElement('td');
        nCloneTd.innerHTML = '<span class="row-details row-details-close"></span>';

        table.find('thead tr').each(function () {
            this.insertBefore(nCloneTh, this.childNodes[0]);
        });

        table.find('tbody tr').each(function () {
            this.insertBefore(nCloneTd.cloneNode(true), this.childNodes[0]);
        });

        /*
         * Initialize DataTables, with no sorting on the 'details' column
         */
        var oTable = table.dataTable({

            // Internationalisation. For more info refer to http://datatables.net/manual/i18n
            "language": {
                "aria": {
                    "sortAscending": ": activate to sort column ascending",
                    "sortDescending": ": activate to sort column descending"
                },
                "emptyTable": "No data available in table",
                "info": "Showing _START_ to _END_ of _TOTAL_ entries",
                "infoEmpty": "No entries found",
                "infoFiltered": "(filtered1 from _MAX_ total entries)",
                "lengthMenu": "Show _MENU_ entries",
                "search": "Search:",
                "zeroRecords": "No matching records found"
            },

            "columnDefs": [{
                "orderable": false,
                "targets": [0,17]
            }],
            "order": [
                [2, 'desc']
            ],
            "lengthMenu": [
                [5, 15, 20, -1],
                [5, 15, 20, "All"] // change per page values here
            ],
            // set the initial value
            "pageLength": 20,
        });
        var tableWrapper = $('#sample_1_wrapper'); // datatable creates the table wrapper by adding with id {your_table_jd}_wrapper

        tableWrapper.find('.dataTables_length select').select2(); // initialize select2 dropdown

        /* Add event listener for opening and closing details
         * Note that the indicator for showing which row is open is not controlled by DataTables,
         * rather it is done here
         */
        table.on('click', ' tbody td .row-details', function () {
            var nTr = $(this).parents('tr')[0];
            if (oTable.fnIsOpen(nTr)) {
                /* This row is already open - close it */
                $(this).addClass("row-details-close").removeClass("row-details-open");
                oTable.fnClose(nTr);
            } else {
                /* Open this row */
                $(this).addClass("row-details-open").removeClass("row-details-close");
                oTable.fnOpen(nTr, fnFormatDetails(oTable, nTr), '');
            }
        });
    }

    return {

        //main function to initiate the module
        init: function () {

            if (!jQuery().dataTable) {
                return;
            }

            initTable3();
            initTable1();

        }

    };

}();