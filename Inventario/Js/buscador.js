(function(document) {
    'use strict';

    var LightTableFilter = {
        init: function() {
            var inputs = document.getElementsByClassName('light-table-filter');
            Array.prototype.forEach.call(inputs, function(input) {
                input.addEventListener('input', LightTableFilter.filter);
            });
        },

        filter: function(event) {
            var filterText = event.target.value.toLowerCase();
            var tables = document.querySelectorAll('.' + event.target.getAttribute('data-table'));
            tables.forEach(function(table) {
                var rows = table.getElementsByTagName('tr');
                Array.prototype.forEach.call(rows, function(row) {
                    var rowData = row.textContent.toLowerCase();
                    if (rowData.indexOf(filterText) !== -1) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });
            });
        }
    };

    document.addEventListener('DOMContentLoaded', function() {
        LightTableFilter.init();
    });

})(document);
