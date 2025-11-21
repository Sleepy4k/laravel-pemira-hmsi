document.addEventListener("DOMContentLoaded", function () {
    const headers = document.querySelector("header[data-debug][data-routes]");
    if (headers) {
        const isDebug = headers.getAttribute("data-debug") === "true";
        const routes = JSON.parse(headers.getAttribute("data-routes") || "{}");

        new OffcanvasHandler({
            debug: isDebug,
            tableId: "#voter-table",
            routes: routes,
            offcanvas: {
                add: {
                    id: "#add-new-record",
                    triggerBtnId: "#add-new-record-btn",
                },
                show: {
                    id: "#show-record",
                    fieldMap: {
                        name: "#show-name",
                        email: "#show-email",
                        batch_id: "#show-batch",
                        voted_at: "#show-voted-at",
                        created_at: "#show-created-at",
                        updated_at: "#show-last-updated",
                    },
                    fieldMapBehavior: {
                        batch_id: function(el, data, rowData) {
                            el.text(rowData.batch.name || data);
                        },
                        voted_at: function(el, data, rowData) {
                            if (data) {
                                el.text(new Date(data).toLocaleString());
                            } else {
                                el.text("Belum Memilih");
                            }
                        }
                    },
                },
                edit: {
                    id: "#edit-record",
                    fieldMap: {
                        name: "#edit-name",
                        email: "#edit-email",
                        batch_id: "#edit-batch_id",
                    },
                    fieldMapBehavior: {
                        batch_id: function(el, data, rowData) {
                            el.val(data).trigger('change');
                        }
                    },
                },
            },
        });
    }
});
