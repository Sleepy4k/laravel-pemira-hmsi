document.addEventListener("DOMContentLoaded", function () {
    const headers = document.querySelector("header[data-debug][data-routes]");
    if (headers) {
        const isDebug = headers.getAttribute("data-debug") === "true";
        const routes = JSON.parse(headers.getAttribute("data-routes") || "{}");

        new OffcanvasHandler({
            debug: isDebug,
            tableId: "#candidate-table",
            routes: routes,
            offcanvas: {
                add: {
                    id: "#add-new-record",
                    triggerBtnId: "#add-new-record-btn",
                },
                show: {
                    id: "#show-record",
                    fieldMap: {
                        first_name: "#show-first_name",
                        created_at: "#show-created-at",
                        updated_at: "#show-last-updated",
                    },
                    fieldMapBehavior: {
                        first_name: function (el, data, rowData) {
                            el.val(rowData.personal.first_name);
                        },
                    },
                },
                edit: {
                    id: "#edit-record",
                    fieldMap: {
                        first_name: "#edit-first_name",
                    },
                    fieldMapBehavior: {
                        first_name: function (el, data, rowData) {
                            el.val(rowData.personal.first_name);
                        },
                    },
                },
            },
        });
    }

    // display file preview in form

});
