const getBreathingReport = function () {
    // Shared variables
    var table;
    var dt;

    // Private functions
    var initDatatable = function () {

        dt = $(table).DataTable({
            searchDelay: 500,
            processing: true,
            serverSide: true,
            // order: [[5, 'desc']],
            stateSave: true,
            ajax: {
                type: 'GET',
                url: site_url + 'Api/Activity/getAll/Pernapasan',
                headers: {
                    "Content-Type": "application/json",
                    "X-Requested-With": "XMLHttpRequest"
                },
                dataSrc: 'data'
            },
            columns: [
                { data: 'mr_no' },
                { data: 'name' },
                { data: 'created_at' },
                { data: 'exercise_session' },
                { data: 'exercise_type' },
                { data: 'is_complaint' },
                { data: 'subjective_complaint' },
                { data: 'borg_scale' },
                { data: 'oxygen_saturation' },
                { data: 'heart_rate' },
                { data: 'complaint' }
            ],
            columnDefs: [
                {
                    targets: 0,
                    data: 'mr_no',
                    render: function (data, type, row) {
                        return `<span class='weekly_report_id d-none'>${row.id}</span>${row.mr_no}`;
                    }
                },
                {
                    targets: 1,
                    data: 'name',
                    render: function (data, type, row) {
                        return `${row.name}`;
                    }
                },
                {
                    targets: 2,
                    data: 'created_at',
                    render: function (data, type, row) {
                        return `${row.created_at}`;
                    }
                },
                {
                    targets: 3,
                    data: 'exercise_session',
                    render: function (data, type, row) {
                        return row.exercise_session
                    }
                },
                {
                    targets: 4,
                    data: 'exercise_type',
                    render: function (data, type, row) {
                        return row.exercise_type
                    }
                },
                {
                    targets: 5,
                    data: 'is_complaint',
                    render: function (data, type, row) {
                        return row.is_complaint
                    }
                },
                {
                    targets: 6,
                    data: 'subjective_complaint',
                    render: function (data, type, row) {
                        return row.subjective_complaint
                    }
                },
                {
                    targets: 7,
                    data: 'borg_scale',
                    render: function (data, type, row) {
                        return row.borg_scale
                    }
                },
                {
                    targets: 8,
                    data: 'oxygen_saturation',
                    render: function (data, type, row) {
                        return row.oxygen_saturation
                    }
                },
                {
                    targets: 9,
                    data: 'heart_rate',
                    render: function (data, type, row) {
                        return row.heart_rate
                    }
                },
                {
                    targets: 10,
                    data: 'complaint',
                    render: function (data, type, row) {
                        return row.complaint
                    }
                }
            ],

        });


        dt.on('draw', function () {
            KTMenu.createInstances();
        });

    }

    var handleSearch = function () {
        const filterSearch = document.querySelector('#searchBreathingReport');

        filterSearch.addEventListener('keyup', function (e) {
            dt.search(e.target.value).draw();
        });
    }


    // Save and Update
    var handleResetTable = () => {

        const resetTable = document.querySelector('[data-kt-breathing-table-filter="reset"]');

        resetTable.addEventListener('click', function (e) {

            e.preventDefault();

            dt.draw();

        });

    }

    // Public methods
    return {
        init: function () {

            table = document.querySelector('#table-breathing-report');

            if (!table) {
                return;
            }

            initDatatable();
            handleSearch();
            handleResetTable();
        }
    }

}();


const getAerobicReport = function () {
    // Shared variables
    var table;
    var dt;

    // Private functions
    var initDatatable = function () {

        dt = $(table).DataTable({
            searchDelay: 500,
            processing: true,
            serverSide: true,
            // order: [[5, 'desc']],
            stateSave: true,
            ajax: {
                type: 'GET',
                url: site_url + 'Api/Activity/getAll/Aerobik',
                headers: {
                    "Content-Type": "application/json",
                    "X-Requested-With": "XMLHttpRequest"
                },
                dataSrc: 'data'
            },
            columns: [
                { data: 'mr_no' },
                { data: 'name' },
                { data: 'created_at' },
                { data: 'exercise_session' },
                { data: 'exercise_type' },
                { data: 'is_complaint' },
                { data: 'subjective_complaint' },
                { data: 'borg_scale' },
                { data: 'oxygen_saturation' },
                { data: 'heart_rate' },
                { data: 'complaint' }
            ],
            columnDefs: [
                {
                    targets: 0,
                    data: 'mr_no',
                    render: function (data, type, row) {
                        return `<span class='weekly_report_id d-none'>${row.id}</span>${row.mr_no}`;
                    }
                },
                {
                    targets: 1,
                    data: 'name',
                    render: function (data, type, row) {
                        return `${row.name}`;
                    }
                },
                {
                    targets: 2,
                    data: 'created_at',
                    render: function (data, type, row) {
                        return `${row.created_at}`;
                    }
                },
                {
                    targets: 3,
                    data: 'exercise_session',
                    render: function (data, type, row) {
                        return row.exercise_session
                    }
                },
                {
                    targets: 4,
                    data: 'exercise_type',
                    render: function (data, type, row) {
                        return row.exercise_type
                    }
                },
                {
                    targets: 5,
                    data: 'is_complaint',
                    render: function (data, type, row) {
                        return row.is_complaint
                    }
                },
                {
                    targets: 6,
                    data: 'subjective_complaint',
                    render: function (data, type, row) {
                        return row.subjective_complaint
                    }
                },
                {
                    targets: 7,
                    data: 'borg_scale',
                    render: function (data, type, row) {
                        return row.borg_scale
                    }
                },
                {
                    targets: 8,
                    data: 'oxygen_saturation',
                    render: function (data, type, row) {
                        return row.oxygen_saturation
                    }
                },
                {
                    targets: 9,
                    data: 'heart_rate',
                    render: function (data, type, row) {
                        return row.heart_rate
                    }
                },
                {
                    targets: 10,
                    data: 'complaint',
                    render: function (data, type, row) {
                        return row.complaint
                    }
                }
            ],

        });


        dt.on('draw', function () {
            KTMenu.createInstances();
        });

    }

    var handleSearch = function () {
        const filterSearch = document.querySelector('#searchAerobicReport');

        filterSearch.addEventListener('keyup', function (e) {
            dt.search(e.target.value).draw();
        });
    }


    // Save and Update
    var handleResetTable = () => {

        const resetTable = document.querySelector('[data-kt-aerobic-table-filter="reset"]');

        resetTable.addEventListener('click', function (e) {

            e.preventDefault();

            dt.draw();

        });

    }

    // Public methods
    return {
        init: function () {

            table = document.querySelector('#table-aerobic-report');

            if (!table) {
                return;
            }

            initDatatable();
            handleSearch();
            handleResetTable();
        }
    }

}();


const getStrengtheningReport = function () {
    // Shared variables
    var table;
    var dt;

    // Private functions
    var initDatatable = function () {

        dt = $(table).DataTable({
            searchDelay: 500,
            processing: true,
            serverSide: true,
            // order: [[5, 'desc']],
            stateSave: true,
            ajax: {
                type: 'GET',
                url: site_url + 'Api/Activity/getAll/Penguatan',
                headers: {
                    "Content-Type": "application/json",
                    "X-Requested-With": "XMLHttpRequest"
                },
                dataSrc: 'data'
            },
            columns: [
                { data: 'mr_no' },
                { data: 'name' },
                { data: 'created_at' },
                { data: 'exercise_session' },
                { data: 'exercise_type' },
                { data: 'is_complaint' },
                { data: 'subjective_complaint' },
                { data: 'borg_scale' },
                { data: 'oxygen_saturation' },
                { data: 'heart_rate' },
                { data: 'complaint' }
            ],
            columnDefs: [
                {
                    targets: 0,
                    data: 'mr_no',
                    render: function (data, type, row) {
                        return `<span class='weekly_report_id d-none'>${row.id}</span>${row.mr_no}`;
                    }
                },
                {
                    targets: 1,
                    data: 'name',
                    render: function (data, type, row) {
                        return `${row.name}`;
                    }
                },
                {
                    targets: 2,
                    data: 'created_at',
                    render: function (data, type, row) {
                        return `${row.created_at}`;
                    }
                },
                {
                    targets: 3,
                    data: 'exercise_session',
                    render: function (data, type, row) {
                        return row.exercise_session
                    }
                },
                {
                    targets: 4,
                    data: 'exercise_type',
                    render: function (data, type, row) {
                        return row.exercise_type
                    }
                },
                {
                    targets: 5,
                    data: 'is_complaint',
                    render: function (data, type, row) {
                        return row.is_complaint
                    }
                },
                {
                    targets: 6,
                    data: 'subjective_complaint',
                    render: function (data, type, row) {
                        return row.subjective_complaint
                    }
                },
                {
                    targets: 7,
                    data: 'borg_scale',
                    render: function (data, type, row) {
                        return row.borg_scale
                    }
                },
                {
                    targets: 8,
                    data: 'oxygen_saturation',
                    render: function (data, type, row) {
                        return row.oxygen_saturation
                    }
                },
                {
                    targets: 9,
                    data: 'heart_rate',
                    render: function (data, type, row) {
                        return row.heart_rate
                    }
                },
                {
                    targets: 10,
                    data: 'complaint',
                    render: function (data, type, row) {
                        return row.complaint
                    }
                }
            ],

        });


        dt.on('draw', function () {
            KTMenu.createInstances();
        });

    }

    var handleSearch = function () {
        const filterSearch = document.querySelector('#searchStrengtheningReport');

        filterSearch.addEventListener('keyup', function (e) {
            dt.search(e.target.value).draw();
        });
    }


    // Save and Update
    var handleResetTable = () => {

        const resetTable = document.querySelector('[data-kt-strengthening-table-filter="reset"]');

        resetTable.addEventListener('click', function (e) {

            e.preventDefault();

            dt.draw();

        });

    }

    // Public methods
    return {
        init: function () {

            table = document.querySelector('#table-strengthening-report');

            if (!table) {
                return;
            }

            initDatatable();
            handleSearch();
            handleResetTable();
        }
    }

}();


// On document ready
KTUtil.onDOMContentLoaded(function () {

    getBreathingReport.init();
    getAerobicReport.init();
    getStrengtheningReport.init();

});