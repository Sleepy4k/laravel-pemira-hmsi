document.addEventListener("DOMContentLoaded", function () {
    const headers = document.querySelector("header[data-debug][data-routes]");
    if (headers) {
        const isDebug = headers.getAttribute("data-debug") === "true";
        const routes = JSON.parse(headers.getAttribute("data-routes") || "{}");

        new OffcanvasHandler({
            debug: isDebug,
            tableId: "#session-table",
            routes: routes,
            offcanvas: {
                add: {
                    id: "#add-new-record",
                    triggerBtnId: "#add-new-record-btn",
                },
                show: {
                    id: "#show-record",
                    fieldMap: {
                        batch_id: "#show-batch",
                        start_time: "#show-start-time",
                        end_time: "#show-end-time",
                        created_at: "#show-created-at",
                        updated_at: "#show-last-updated",
                    },
                    fieldMapBehavior: {
                        batch_id: function(el, data, rowData) {
                            el.text(rowData.batch.name || data);
                        },
                        start_time: function(el, data, rowData) {
                            el.text(new Date(data).toLocaleString());
                        },
                        end_time: function(el, data, rowData) {
                            el.text(new Date(data).toLocaleString());
                        },
                    },
                },
                edit: {
                    id: "#edit-record",
                    fieldMap: {
                        batch_id: "#edit-batch_id",
                        start_time: "#edit-start_time",
                        end_time: "#edit-end_time",
                    },
                    fieldMapBehavior: {
                        batch_id: function(el, data, rowData) {
                            el.val(data).trigger('change');
                        },
                        start_time: function(el, data, rowData) {
                            el.val(data);
                        },
                        end_time: function(el, data, rowData) {
                            el.val(data);
                        },
                    },
                },
            },
        });
    }
});
