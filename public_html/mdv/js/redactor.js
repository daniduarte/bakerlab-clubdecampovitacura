var rwindow, rdocument;
if (typeof RELANG === "undefined") {
    var RELANG = {};
};
var RLANG = {
    html: "HTML",
    video: "Insertar Video",
    image: "Insertar Imagen",
    table: "Tabla",
    link: "Link",
    link_insert: "Insertar link",
    unlink: "Eliminar link",
    formatting: "Formatear",
    paragraph: "Parrafo",
    quote: "Cita",
    code: "Codigo",
    header1: "Header 1",
    header2: "Header 2",
    header3: "Header 3",
    header4: "Header 4",
    bold: "Negrita",
    italic: "Cursiva",
    fontcolor: "Color de Fuente",
    backcolor: "Color de Fondo",
    unorderedlist: "Lista Desordenada",
    orderedlist: "Lista Ordenada",
    outdent: "Sangria",
    indent: "Sangria",
    cancel: "Cancelar",
    insert: "Insertar",
    save: "Guardar",
    _delete: "Borrar",
    insert_table: "Insertar Tabla",
    insert_row_above: "Agregar Fila Encima",
    insert_row_below: "Agregar Fila Debajo",
    insert_column_left: "Agregar Columna Izquierda",
    insert_column_right: "Agregar Columna Derecha",
    delete_column: "Borrar Columna",
    delete_row: "Borrar Fila",
    delete_table: "Borrar Tabla",
    rows: "Filas",
    columns: "Columnas",
    add_head: "Agregar Cabecera",
    delete_head: "Borrar Cabecera",
    title: "Titulo",
    image_position: "Posicion",
    none: "Ninguno",
    left: "Izquierda",
    right: "Derecha",
    image_web_link: "Link de Imagen",
    text: "Texto",
    mailto: "Email",
    web: "URL",
    video_html_code: "Codigo embebido de Video",
    file: "Insertar Archivo",
    upload: "Subir",
    download: "Descargar",
    choose: "Escoger",
    or_choose: "O escoja",
    drop_file_here: "Arrastrar archivo aqui",
    align_left: "Alinear texto a la Izquierda",
    align_center: "Centrar Texto",
    align_right: "Alinear texto a la Derecha",
    align_justify: "Justificar texto",
    horizontalrule: "Insertar Regla Horizontal",
    deleted: "Eliminado",
    anchor: "Ancla",
    link_new_tab: "Abrir enlace en ventana nueva",
    underline: "Subrayado",
    alignment: "Alineacion"
};
(function (_0x9e20x4) {
    jQuery["fn"]["redactor"] = function (_0x9e20x5) {
        return this["each"](function () {
            var _0x9e20x6 = _0x9e20x4(this);
            var _0x9e20x7 = _0x9e20x6["data"]("redactor");
            if (!_0x9e20x7) {
                _0x9e20x6["data"]("redactor", (_0x9e20x7 = new _0x9e20x8(this, _0x9e20x5)));
            };
        });
    };
    var _0x9e20x8 = function (_0x9e20x9, _0x9e20xa) {
        this["$el"] = _0x9e20x4(_0x9e20x9);
        if (typeof _0x9e20xa !== "undefined" && typeof _0x9e20xa["lang"] !== "undefined" && _0x9e20xa["lang"] !== "en" && typeof RELANG[_0x9e20xa["lang"]] !== "undefined") {
            RLANG = RELANG[_0x9e20xa["lang"]];
        };
        this["opts"] = _0x9e20x4["extend"]({
            iframe: false,
            css: false,
            lang: "en",
            direction: "ltr",
            callback: false,
            keyupCallback: false,
            keydownCallback: false,
            execCommandCallback: false,
            plugins: false,
            cleanup: true,
            focus: false,
            tabindex: false,
            autoresize: true,
            minHeight: false,
            fixed: false,
            fixedTop: 0,
            fixedBox: false,
            source: true,
            shortcuts: true,
            mobile: true,
            air: false,
            wym: false,
            convertLinks: true,
            convertDivs: true,
            protocol: "http://",
            autosave: false,
            autosaveCallback: false,
            interval: 60,
            imageGetJson: false,
            imageUpload: false,
            imageUploadCallback: false,
            imageUploadErrorCallback: false,
            fileUpload: false,
            fileUploadCallback: false,
            fileUploadErrorCallback: false,
            uploadCrossDomain: false,
            uploadFields: false,
            observeImages: true,
            overlay: true,
            allowedTags: ["form", "input", "button", "select", "option", "datalist", "output", "textarea", "fieldset", "legend", "section", "header", "hgroup", "aside", "footer", "article", "details", "nav", "progress", "time", "canvas", "code", "span", "div", "label", "a", "br", "p", "b", "i", "del", "strike", "u", "img", "video", "source", "track", "audio", "iframe", "object", "embed", "param", "blockquote", "mark", "cite", "small", "ul", "ol", "li", "hr", "dl", "dt", "dd", "sup", "sub", "big", "pre", "code", "figure", "figcaption", "strong", "em", "table", "tr", "td", "th", "tbody", "thead", "tfoot", "h1", "h2", "h3", "h4", "h5", "h6"],
            toolbarExternal: false,
            buttonsCustom: {},
            buttonsAdd: [],
            buttons: ["html", "|", "formatting", "|", "bold", "italic", "deleted", "|", "unorderedlist", "orderedlist", "outdent", "indent", "|", "image", "video", "file", "table", "link", "|", "fontcolor", "backcolor", "|", "alignment", "|", "horizontalrule"],
            airButtons: ["formatting", "|", "bold", "italic", "deleted", "|", "unorderedlist", "orderedlist", "outdent", "indent", "|", "fontcolor", "backcolor"],
            formattingTags: ["p", "blockquote", "pre", "h1", "h2", "h3", "h4"],
            activeButtons: ["deleted", "italic", "bold", "underline", "unorderedlist", "orderedlist"],
            activeButtonsStates: {
                b: "bold",
                strong: "bold",
                i: "italic",
                em: "italic",
                del: "deleted",
                strike: "deleted",
                ul: "unorderedlist",
                ol: "orderedlist",
                u: "underline"
            },
            colors: ["#ffffff", "#000000", "#eeece1", "#1f497d", "#4f81bd", "#c0504d", "#9bbb59", "#8064a2", "#4bacc6", "#f79646", "#ffff00", "#f2f2f2", "#7f7f7f", "#ddd9c3", "#c6d9f0", "#dbe5f1", "#f2dcdb", "#ebf1dd", "#e5e0ec", "#dbeef3", "#fdeada", "#fff2ca", "#d8d8d8", "#595959", "#c4bd97", "#8db3e2", "#b8cce4", "#e5b9b7", "#d7e3bc", "#ccc1d9", "#b7dde8", "#fbd5b5", "#ffe694", "#bfbfbf", "#3f3f3f", "#938953", "#548dd4", "#95b3d7", "#d99694", "#c3d69b", "#b2a2c7", "#b7dde8", "#fac08f", "#f2c314", "#a5a5a5", "#262626", "#494429", "#17365d", "#366092", "#953734", "#76923c", "#5f497a", "#92cddc", "#e36c09", "#c09100", "#7f7f7f", "#0c0c0c", "#1d1b10", "#0f243e", "#244061", "#632423", "#4f6128", "#3f3151", "#31859b", "#974806", "#7f6000"],
            emptyHtml: "<p><br /></p>",
            buffer: false,
            visual: true,
            modal_file: String() + "<div id=\"redactor_modal_content\">" + "<form id=\"redactorUploadFileForm\" method=\"post\" action=\"\" enctype=\"multipart/form-data\">" + "<label>Name (optional)</label>" + "<input type=\"text\" id=\"redactor_filename\" class=\"redactor_input\" />" + "<div style=\"margin-top: 7px;\">" + "<input type=\"file\" id=\"redactor_file\" name=\"file\" />" + "</div>" + "</form><br>" + "</div>",
            modal_image_edit: String() + "<div id=\"redactor_modal_content\">" + "<label>" + RLANG["title"] + "</label>" + "<input id=\"redactor_file_alt\" class=\"redactor_input\" />" + "<label>" + RLANG["link"] + "</label>" + "<input id=\"redactor_file_link\" class=\"redactor_input\" />" + "<label>" + RLANG["image_position"] + "</label>" + "<select id=\"redactor_form_image_align\">" + "<option value=\"none\">" + RLANG["none"] + "</option>" + "<option value=\"left\">" + RLANG["left"] + "</option>" + "<option value=\"right\">" + RLANG["right"] + "</option>" + "</select>" + "</div>" + "<div id=\"redactor_modal_footer\">" + "<a href=\"javascript:void(null);\" id=\"redactor_image_delete_btn\" class=\"redactor_modal_btn\">" + RLANG["_delete"] + "</a>&nbsp;&nbsp;&nbsp;" + "<a href=\"javascript:void(null);\" class=\"redactor_modal_btn redactor_btn_modal_close\">" + RLANG["cancel"] + "</a>" + "<input type=\"button\" name=\"save\" class=\"redactor_modal_btn\" id=\"redactorSaveBtn\" value=\"" + RLANG["save"] + "\" />" + "</div>",
            modal_image: String() + "<div id=\"redactor_modal_content\">" + "<div id=\"redactor_tabs\">" + "<a href=\"javascript:void(null);\" class=\"redactor_tabs_act\">" + RLANG["upload"] + "</a>" + "<a href=\"javascript:void(null);\">" + RLANG["choose"] + "</a>" + "<a href=\"javascript:void(null);\">" + RLANG["link"] + "</a>" + "</div>" + "<form id=\"redactorInsertImageForm\" method=\"post\" action=\"\" enctype=\"multipart/form-data\">" + "<div id=\"redactor_tab1\" class=\"redactor_tab\">" + "<input type=\"file\" id=\"redactor_file\" name=\"file\" />" + "</div>" + "<div id=\"redactor_tab2\" class=\"redactor_tab\" style=\"display: none;\">" + "<div id=\"redactor_image_box\"></div>" + "</div>" + "</form>" + "<div id=\"redactor_tab3\" class=\"redactor_tab\" style=\"display: none;\">" + "<label>" + RLANG["image_web_link"] + "</label>" + "<input type=\"text\" name=\"redactor_file_link\" id=\"redactor_file_link\" class=\"redactor_input\"  />" + "</div>" + "</div>" + "<div id=\"redactor_modal_footer\">" + "<a href=\"javascript:void(null);\" class=\"redactor_modal_btn redactor_btn_modal_close\">" + RLANG["cancel"] + "</a>" + "<input type=\"button\" name=\"upload\" class=\"redactor_modal_btn\" id=\"redactor_upload_btn\" value=\"" + RLANG["insert"] + "\" />" + "</div>",
            modal_link: String() + "<div id=\"redactor_modal_content\">" + "<form id=\"redactorInsertLinkForm\" method=\"post\" action=\"\">" + "<div id=\"redactor_tabs\">" + "<a href=\"javascript:void(null);\" class=\"redactor_tabs_act\">URL</a>" + "<a href=\"javascript:void(null);\">Email</a>" + "<a href=\"javascript:void(null);\">" + RLANG["anchor"] + "</a>" + "</div>" + "<input type=\"hidden\" id=\"redactor_tab_selected\" value=\"1\" />" + "<div class=\"redactor_tab\" id=\"redactor_tab1\">" + "<label>URL</label><input type=\"text\" id=\"redactor_link_url\" class=\"redactor_input\"  />" + "<label>" + RLANG["text"] + "</label><input type=\"text\" class=\"redactor_input redactor_link_text\" id=\"redactor_link_url_text\" />" + "<label><input type=\"checkbox\" id=\"redactor_link_blank\"> " + RLANG["link_new_tab"] + "</label>" + "</div>" + "<div class=\"redactor_tab\" id=\"redactor_tab2\" style=\"display: none;\">" + "<label>Email</label><input type=\"text\" id=\"redactor_link_mailto\" class=\"redactor_input\" />" + "<label>" + RLANG["text"] + "</label><input type=\"text\" class=\"redactor_input redactor_link_text\" id=\"redactor_link_mailto_text\" />" + "</div>" + "<div class=\"redactor_tab\" id=\"redactor_tab3\" style=\"display: none;\">" + "<label>" + RLANG["anchor"] + "</label><input type=\"text\" class=\"redactor_input\" id=\"redactor_link_anchor\"  />" + "<label>" + RLANG["text"] + "</label><input type=\"text\" class=\"redactor_input redactor_link_text\" id=\"redactor_link_anchor_text\" />" + "</div>" + "</form>" + "</div>" + "<div id=\"redactor_modal_footer\">" + "<a href=\"javascript:void(null);\" class=\"redactor_modal_btn redactor_btn_modal_close\">" + RLANG["cancel"] + "</a>" + "<input type=\"button\" class=\"redactor_modal_btn\" id=\"redactor_insert_link_btn\" value=\"" + RLANG["insert"] + "\" />" + "</div>",
            modal_table: String() + "<div id=\"redactor_modal_content\">" + "<label>" + RLANG["rows"] + "</label>" + "<input type=\"text\" size=\"5\" value=\"2\" id=\"redactor_table_rows\" />" + "<label>" + RLANG["columns"] + "</label>" + "<input type=\"text\" size=\"5\" value=\"3\" id=\"redactor_table_columns\" />" + "</div>" + "<div id=\"redactor_modal_footer\">" + "<a href=\"javascript:void(null);\" class=\"redactor_modal_btn redactor_btn_modal_close\">" + RLANG["cancel"] + "</a>" + "<input type=\"button\" name=\"upload\" class=\"redactor_modal_btn\" id=\"redactor_insert_table_btn\" value=\"" + RLANG["insert"] + "\" />" + "</div>",
            modal_video: String() + "<div id=\"redactor_modal_content\">" + "<form id=\"redactorInsertVideoForm\">" + "<label>" + RLANG["video_html_code"] + "</label>" + "<textarea id=\"redactor_insert_video_area\" style=\"width: 99%; height: 160px;\"></textarea>" + "</form>" + "</div>" + "<div id=\"redactor_modal_footer\">" + "<a href=\"javascript:void(null);\" class=\"redactor_modal_btn redactor_btn_modal_close\">" + RLANG["cancel"] + "</a>" + "<input type=\"button\" class=\"redactor_modal_btn\" id=\"redactor_insert_video_btn\" value=\"" + RLANG["insert"] + "\" />" + "</div>",
            toolbar: {
                html: {
                    title: RLANG["html"],
                    func: "toggle"
                },
                formatting: {
                    title: RLANG["formatting"],
                    func: "show",
                    dropdown: {
                        p: {
                            title: RLANG["paragraph"],
                            exec: "formatblock"
                        },
                        blockquote: {
                            title: RLANG["quote"],
                            exec: "formatblock",
                            className: "redactor_format_blockquote"
                        },
                        pre: {
                            title: RLANG["code"],
                            exec: "formatblock",
                            className: "redactor_format_pre"
                        },
                        h1: {
                            title: RLANG["header1"],
                            exec: "formatblock",
                            className: "redactor_format_h1"
                        },
                        h2: {
                            title: RLANG["header2"],
                            exec: "formatblock",
                            className: "redactor_format_h2"
                        },
                        h3: {
                            title: RLANG["header3"],
                            exec: "formatblock",
                            className: "redactor_format_h3"
                        },
                        h4: {
                            title: RLANG["header4"],
                            exec: "formatblock",
                            className: "redactor_format_h4"
                        }
                    }
                },
                bold: {
                    title: RLANG["bold"],
                    exec: "bold"
                },
                italic: {
                    title: RLANG["italic"],
                    exec: "italic"
                },
                deleted: {
                    title: RLANG["deleted"],
                    exec: "strikethrough"
                },
                underline: {
                    title: RLANG["underline"],
                    exec: "underline"
                },
                unorderedlist: {
                    title: "&bull; " + RLANG["unorderedlist"],
                    exec: "insertunorderedlist"
                },
                orderedlist: {
                    title: "1. " + RLANG["orderedlist"],
                    exec: "insertorderedlist"
                },
                outdent: {
                    title: "< " + RLANG["outdent"],
                    exec: "outdent"
                },
                indent: {
                    title: "> " + RLANG["indent"],
                    exec: "indent"
                },
                image: {
                    title: RLANG["image"],
                    func: "showImage"
                },
                video: {
                    title: RLANG["video"],
                    func: "showVideo"
                },
                file: {
                    title: RLANG["file"],
                    func: "showFile"
                },
                table: {
                    title: RLANG["table"],
                    func: "show",
                    dropdown: {
                        insert_table: {
                            title: RLANG["insert_table"],
                            func: "showTable"
                        },
                        separator_drop1: {
                            name: "separator"
                        },
                        insert_row_above: {
                            title: RLANG["insert_row_above"],
                            func: "insertRowAbove"
                        },
                        insert_row_below: {
                            title: RLANG["insert_row_below"],
                            func: "insertRowBelow"
                        },
                        insert_column_left: {
                            title: RLANG["insert_column_left"],
                            func: "insertColumnLeft"
                        },
                        insert_column_right: {
                            title: RLANG["insert_column_right"],
                            func: "insertColumnRight"
                        },
                        separator_drop2: {
                            name: "separator"
                        },
                        add_head: {
                            title: RLANG["add_head"],
                            func: "addHead"
                        },
                        delete_head: {
                            title: RLANG["delete_head"],
                            func: "deleteHead"
                        },
                        separator_drop3: {
                            name: "separator"
                        },
                        delete_column: {
                            title: RLANG["delete_column"],
                            func: "deleteColumn"
                        },
                        delete_row: {
                            title: RLANG["delete_row"],
                            func: "deleteRow"
                        },
                        delete_table: {
                            title: RLANG["delete_table"],
                            func: "deleteTable"
                        }
                    }
                },
                link: {
                    title: RLANG["link"],
                    func: "show",
                    dropdown: {
                        link: {
                            title: RLANG["link_insert"],
                            func: "showLink"
                        },
                        unlink: {
                            title: RLANG["unlink"],
                            exec: "unlink"
                        }
                    }
                },
                fontcolor: {
                    title: RLANG["fontcolor"],
                    func: "show"
                },
                backcolor: {
                    title: RLANG["backcolor"],
                    func: "show"
                },
                alignment: {
                    title: RLANG["alignment"],
                    func: "show",
                    dropdown: {
                        alignleft: {
                            title: RLANG["align_left"],
                            exec: "JustifyLeft"
                        },
                        aligncenter: {
                            title: RLANG["align_center"],
                            exec: "JustifyCenter"
                        },
                        alignright: {
                            title: RLANG["align_right"],
                            exec: "JustifyRight"
                        },
                        justify: {
                            title: RLANG["align_justify"],
                            exec: "JustifyFull"
                        }
                    }
                },
                alignleft: {
                    exec: "JustifyLeft",
                    title: RLANG["align_left"]
                },
                aligncenter: {
                    exec: "JustifyCenter",
                    title: RLANG["align_center"]
                },
                alignright: {
                    exec: "JustifyRight",
                    title: RLANG["align_right"]
                },
                justify: {
                    exec: "JustifyFull",
                    title: RLANG["align_justify"]
                },
                horizontalrule: {
                    exec: "inserthorizontalrule",
                    title: RLANG["horizontalrule"]
                }
            }
        }, _0x9e20xa, this["$el"]["data"]());
        this["dropdowns"] = [];
        this["init"]();
    };
    _0x9e20x8["prototype"] = {
        init: function () {
            this["height"] = this["$el"]["css"]("height");
            this["width"] = this["$el"]["css"]("width");
            rdocument = this["document"] = document;
            rwindow = this["window"] = window;
            if (this["opts"]["mobile"] === false && this["isMobile"]()) {
                this["build"](true);
                return false;
            };
            if (this["opts"]["iframe"]) {
                this["opts"]["autoresize"] = false;
            };
            if (this["opts"]["air"]) {
                this["opts"]["buttons"] = this["opts"]["airButtons"];
            } else {
                if (this["opts"]["toolbar"] !== false) {
                    if (this["opts"]["source"] === false) {
                        var _0x9e20xb = this["opts"]["buttons"]["indexOf"]("html");
                        var _0x9e20xc = this["opts"]["buttons"][_0x9e20xb + 1];
                        this["opts"]["buttons"]["splice"](_0x9e20xb, 1);
                        if (typeof _0x9e20xc !== "undefined" && _0x9e20xc === "|") {
                            this["opts"]["buttons"]["splice"](_0x9e20xb, 1);
                        };
                    };
                    _0x9e20x4["extend"](this["opts"]["toolbar"], this["opts"]["buttonsCustom"]);
                    _0x9e20x4["each"](this["opts"]["buttonsAdd"], _0x9e20x4["proxy"](function (_0x9e20xd, _0x9e20xe) {
                        this["opts"]["buttons"]["push"](_0x9e20xe);
                    }, this));
                };
            }; if (this["opts"]["toolbar"] !== false) {
                _0x9e20x4["each"](this["opts"]["toolbar"]["formatting"]["dropdown"], _0x9e20x4["proxy"](function (_0x9e20xd, _0x9e20xe) {
                    if (_0x9e20x4["inArray"](_0x9e20xd, this["opts"]["formattingTags"]) == "-1") {
                        delete this["opts"]["toolbar"]["formatting"]["dropdown"][_0x9e20xd];
                    };
                }, this));
            };

            function _0x9e20xf() {
                this["enableAir"]();
                this["buildToolbar"]();
                if (typeof this["opts"]["plugins"] === "object") {
                    _0x9e20x4["each"](this["opts"]["plugins"], _0x9e20x4["proxy"](function (_0x9e20xd, _0x9e20xe) {
                        if (typeof RedactorPlugins[_0x9e20xe] !== "undefined") {
                            _0x9e20x4["extend"](this, RedactorPlugins[_0x9e20xe]);
                            if (typeof RedactorPlugins[_0x9e20xe]["init"] !== "undefined") {
                                this["init"]();
                            };
                        };
                    }, this));
                };
                if (this["opts"]["activeButtons"] !== false && this["opts"]["toolbar"] !== false) {
                    var _0x9e20x10 = _0x9e20x4["proxy"](function () {
                        this["observeFormatting"]();
                    }, this);
                    this["$editor"]["click"](_0x9e20x10)["keyup"](_0x9e20x10);
                };
                var _0x9e20x11 = false;
                if (this["browser"]("webkit") && navigator["userAgent"]["indexOf"]("Chrome") === -1) {
                    var _0x9e20x12 = this["browser"]("version")["split"](".");
                    if (_0x9e20x12[0] < 536) {
                        _0x9e20x11 = true;
                    };
                };
                if (this["isMobile"](true) === false && _0x9e20x11 === false && this["browser"]("opera") === false) {
                    this["$editor"]["bind"]("paste", _0x9e20x4["proxy"](function (_0x9e20x13) {
                        if (this["opts"]["cleanup"] === false) {
                            return true;
                        };
                        this["pasteRunning"] = true;
                        this["setBuffer"]();
                        if (this["opts"]["autoresize"] === true) {
                            this["saveScroll"] = this["document"]["body"]["scrollTop"];
                        } else {
                            this["saveScroll"] = this["$editor"]["scrollTop"]();
                        };
                        var _0x9e20x14 = this["extractContent"]();
                        setTimeout(_0x9e20x4["proxy"](function () {
                            var _0x9e20x15 = this["extractContent"]();
                            this["$editor"]["append"](_0x9e20x14);
                            this["restoreSelection"]();
                            var _0x9e20x16 = this["getFragmentHtml"](_0x9e20x15);
                            this["pasteCleanUp"](_0x9e20x16);
                            this["pasteRunning"] = false;
                        }, this), 1);
                    }, this));
                };
                this["keyup"]();
                this["keydown"]();
                if (this["opts"]["autosave"] !== false) {
                    this["autoSave"]();
                };
                setTimeout(_0x9e20x4["proxy"](function () {
                    this["observeImages"]();
                    this["observeTables"]();
                }, this), 1);
                if (this["browser"]("mozilla")) {
                    this["$editor"]["click"](_0x9e20x4["proxy"](function () {
                        this["saveSelection"]();
                    }, this));
                    try {
                        this["document"]["execCommand"]("enableObjectResizing", false, false);
                        this["document"]["execCommand"]("enableInlineTableEditing", false, false);
                    } catch (e) {};
                };
                if (this["opts"]["focus"]) {
                    setTimeout(_0x9e20x4["proxy"](function () {
                        this["$editor"]["focus"]();
                    }, this), 1);
                };
                if (this["opts"]["fixed"]) {
                    this["observeScroll"]();
                    _0x9e20x4(document)["scroll"](_0x9e20x4["proxy"](this["observeScroll"], this));
                };
                if (typeof this["opts"]["callback"] === "function") {
                    this["opts"]["callback"](this);
                };
                if (this["opts"]["toolbar"] !== false) {
                    this["$toolbar"]["find"]("a")["attr"]("tabindex", "-1");
                };
            };
            this["build"](false, _0x9e20xf);
        },
        shortcuts: function (_0x9e20x13, _0x9e20x17) {
            _0x9e20x13["preventDefault"]();
            this["execCommand"](_0x9e20x17, false);
        },
        keyup: function () {
            this["$editor"]["keyup"](_0x9e20x4["proxy"](function (_0x9e20x13) {
                var _0x9e20x18 = _0x9e20x13["keyCode"] || _0x9e20x13["which"];
                if (this["browser"]("mozilla") && !this["pasteRunning"]) {
                    this["saveSelection"]();
                };
                if (typeof this["opts"]["keyupCallback"] === "function") {
                    this["opts"]["keyupCallback"](this, _0x9e20x13);
                };
                if (_0x9e20x18 === 8 || _0x9e20x18 === 46) {
                    this["observeImages"]();
                    return this["formatEmpty"](_0x9e20x13);
                };
                if (_0x9e20x18 === 13 && !_0x9e20x13["shiftKey"] && !_0x9e20x13["ctrlKey"] && !_0x9e20x13["metaKey"]) {
                    if (this["browser"]("webkit")) {
                        this["formatNewLine"](_0x9e20x13);
                    };
                    if (this["opts"]["convertLinks"]) {
                        this["$editor"]["linkify"]();
                    };
                };
                this["syncCode"]();
            }, this));
        },
        keydown: function () {
            this["$editor"]["keydown"](_0x9e20x4["proxy"](function (_0x9e20x13) {
                var _0x9e20x18 = _0x9e20x13["keyCode"] || _0x9e20x13["which"];
                var _0x9e20x19 = this["getParentNode"]();
                var _0x9e20x1a = this["getCurrentNode"]();
                var _0x9e20x1b = false;
                var _0x9e20x1c = _0x9e20x13["ctrlKey"] || _0x9e20x13["metaKey"];
                if ((_0x9e20x19 || _0x9e20x1a) && (_0x9e20x4(_0x9e20x19)["get"](0)["tagName"] === "PRE" || _0x9e20x4(_0x9e20x1a)["get"](0)["tagName"] === "PRE")) {
                    _0x9e20x1b = true;
                };
                if (typeof this["opts"]["keydownCallback"] === "function") {
                    this["opts"]["keydownCallback"](this, _0x9e20x13);
                };
                if (_0x9e20x1c && this["opts"]["shortcuts"]) {
                    if (_0x9e20x18 === 90) {
                        if (this["opts"]["buffer"] !== false) {
                            _0x9e20x13["preventDefault"]();
                            this["getBuffer"]();
                        } else {
                            if (_0x9e20x13["shiftKey"]) {
                                this["shortcuts"](_0x9e20x13, "redo");
                            } else {
                                this["shortcuts"](_0x9e20x13, "undo");
                            };
                        };
                    } else {
                        if (_0x9e20x18 === 77) {
                            this["shortcuts"](_0x9e20x13, "removeFormat");
                        } else {
                            if (_0x9e20x18 === 66) {
                                this["shortcuts"](_0x9e20x13, "bold");
                            } else {
                                if (_0x9e20x18 === 73) {
                                    this["shortcuts"](_0x9e20x13, "italic");
                                } else {
                                    if (_0x9e20x18 === 74) {
                                        this["shortcuts"](_0x9e20x13, "insertunorderedlist");
                                    } else {
                                        if (_0x9e20x18 === 75) {
                                            this["shortcuts"](_0x9e20x13, "insertorderedlist");
                                        } else {
                                            if (_0x9e20x18 === 76) {
                                                this["shortcuts"](_0x9e20x13, "superscript");
                                            } else {
                                                if (_0x9e20x18 === 72) {
                                                    this["shortcuts"](_0x9e20x13, "subscript");
                                                };
                                            };
                                        };
                                    };
                                };
                            };
                        };
                    };
                };
                if (!_0x9e20x1c && _0x9e20x18 !== 90) {
                    this["opts"]["buffer"] = false;
                };
                if (_0x9e20x1b === true && _0x9e20x18 === 13) {
                    _0x9e20x13["preventDefault"]();
                    var _0x9e20x16 = _0x9e20x4(_0x9e20x1a)["parent"]()["text"]();
                    this["insertNodeAtCaret"](this["document"]["createTextNode"]("\x0D\x0A"));
                    if (_0x9e20x16["search"](/\s$/) == -1) {
                        this["insertNodeAtCaret"](this["document"]["createTextNode"]("\x0D\x0A"));
                    };
                    this["syncCode"]();
                    return false;
                };
                if (this["opts"]["shortcuts"] && !_0x9e20x13["shiftKey"] && _0x9e20x18 === 9) {
                    if (_0x9e20x1b === false) {
                        this["shortcuts"](_0x9e20x13, "indent");
                    } else {
                        _0x9e20x13["preventDefault"]();
                        this["insertNodeAtCaret"](this["document"]["createTextNode"]("\x09"));
                        this["syncCode"]();
                        return false;
                    };
                } else {
                    if (this["opts"]["shortcuts"] && _0x9e20x13["shiftKey"] && _0x9e20x18 === 9) {
                        this["shortcuts"](_0x9e20x13, "outdent");
                    };
                }; if (this["browser"]("webkit") && navigator["userAgent"]["indexOf"]("Chrome") === -1) {
                    return this["safariShiftKeyEnter"](_0x9e20x13, _0x9e20x18);
                };
            }, this));
        },
        build: function (_0x9e20x1d, _0x9e20x1e) {
            if (_0x9e20x1d !== true) {
                this["$box"] = _0x9e20x4("<div class=\"redactor_box\"></div>");
                if (this["opts"]["air"]) {
                    this["air"] = _0x9e20x4("<div class=\"redactor_air\" style=\"display: none;\"></div>");
                };
                this["$content"] = null;

                function _0x9e20x1f() {
                    this["$editor"] = this["$content"]["contents"]()["find"]("body")["attr"]("contenteditable", true)["attr"]("dir", this["opts"]["direction"]);
                    rdocument = this["document"] = this["$editor"][0]["ownerDocument"];
                    rwindow = this["window"] = this["document"]["defaultView"] || window;
                    if (this["opts"]["css"] !== false) {
                        this["$content"]["contents"]()["find"]("head")["append"]("<link rel=\"stylesheet\" href=\"" + this["opts"]["css"] + "\" />");
                    };
                    this["$editor"]["html"](_0x9e20x16);
                    if (_0x9e20x1e) {
                        _0x9e20x1e["call"](this);
                        _0x9e20x1e = null;
                    };
                };
                this["textareamode"] = true;
                if (this["$el"]["get"](0)["tagName"] === "TEXTAREA") {
                    if (this["opts"]["iframe"]) {
                        var _0x9e20x20 = this;
                        this["$content"] = _0x9e20x4("<iframe style=\"width: 100%;\" frameborder=\"0\"></iframe>")["load"](function () {
                            _0x9e20x1f["call"](_0x9e20x20);
                        });
                    } else {
                        this["$content"] = this["$editor"] = _0x9e20x4("<div></div>");
                    };
                    var _0x9e20x21 = this["$el"]["get"](0)["className"]["split"](/\s+/);
                    _0x9e20x4["each"](_0x9e20x21, _0x9e20x4["proxy"](function (_0x9e20xd, _0x9e20xe) {
                        this["$content"]["addClass"]("redactor_" + _0x9e20xe);
                    }, this));
                } else {
                    this["textareamode"] = false;
                    this["$content"] = this["$editor"] = this["$el"];
                    this["$el"] = _0x9e20x4("<textarea name=\"" + this["$editor"]["attr"]("id") + "\"></textarea>")["css"]("height", this["height"]);
                }; if (this["$editor"]) {
                    this["$editor"]["addClass"]("redactor_editor")["attr"]("contenteditable", true)["attr"]("dir", this["opts"]["direction"]);
                };
                if (this["opts"]["tabindex"] !== false) {
                    this["$content"]["attr"]("tabindex", this["opts"]["tabindex"]);
                };
                if (this["opts"]["minHeight"] !== false) {
                    this["$content"]["css"]("min-height", this["opts"]["minHeight"] + "px");
                };
                if (this["opts"]["wym"] === true) {
                    this["$content"]["addClass"]("redactor_editor_wym");
                };
                if (this["opts"]["autoresize"] === false) {
                    this["$content"]["css"]("height", this["height"]);
                };
                this["$el"]["hide"]();
                var _0x9e20x16 = "";
                if (this["textareamode"]) {
                    _0x9e20x16 = this["$el"]["val"]();
                    _0x9e20x16 = this["savePreCode"](_0x9e20x16);
                    this["$box"]["insertAfter"](this.$el)["append"](this.$content)["append"](this.$el);
                } else {
                    _0x9e20x16 = this["$editor"]["html"]();
                    _0x9e20x16 = this["savePreCode"](_0x9e20x16);
                    this["$box"]["insertAfter"](this.$content)["append"](this.$el)["append"](this.$editor);
                };
                _0x9e20x16 = this["paragraphy"](_0x9e20x16);
                if (this["$editor"]) {
                    this["$editor"]["html"](_0x9e20x16);
                };
                if (this["textareamode"] === false) {
                    this["syncCode"]();
                };
            } else {
                if (this["$el"]["get"](0)["tagName"] !== "TEXTAREA") {
                    var _0x9e20x16 = this["$el"]["val"]();
                    var _0x9e20x22 = _0x9e20x4("<textarea name=\"" + this["$editor"]["attr"]("id") + "\"></textarea>")["css"]("height", this["height"])["val"](_0x9e20x16);
                    this["$el"]["hide"]();
                    this["$el"]["after"](_0x9e20x22);
                };
            }; if (_0x9e20x1e && this["$editor"]) {
                _0x9e20x1e["call"](this);
            };
        },
        enableAir: function () {
            if (this["opts"]["air"] === false) {
                return false;
            };
            this["air"]["hide"]();
            this["$editor"]["bind"]("textselect", _0x9e20x4["proxy"](function (_0x9e20x13) {
                this["showAir"](_0x9e20x13);
            }, this));
            this["$editor"]["bind"]("textunselect", _0x9e20x4["proxy"](function () {
                this["air"]["hide"]();
            }, this));
        },
        showAir: function (_0x9e20x13) {
            _0x9e20x4(".redactor_air")["hide"]();
            var _0x9e20x23 = this["air"]["innerWidth"]();
            var _0x9e20x24 = _0x9e20x13["clientX"];
            if (_0x9e20x4(this["document"])["width"]() < (_0x9e20x24 + _0x9e20x23)) {
                _0x9e20x24 = _0x9e20x24 - _0x9e20x23;
            };
            var _0x9e20x25 = _0x9e20x13["clientY"] + _0x9e20x4(document)["scrollTop"]() + 14;
            if (this["opts"]["iframe"] === true) {
                _0x9e20x25 = _0x9e20x25 + this["$box"]["position"]()["top"];
                _0x9e20x24 = _0x9e20x24 + this["$box"]["position"]()["left"];
            };
            this["air"]["css"]({
                left: _0x9e20x24 + "px",
                top: _0x9e20x25 + "px"
            })["show"]();
        },
        syncCode: function () {
            this["$el"]["val"](this["$editor"]["html"]());
        },
        setCode: function (_0x9e20x16) {
            _0x9e20x16 = this["stripTags"](_0x9e20x16);
            this["$editor"]["html"](_0x9e20x16)["focus"]();
            this["syncCode"]();
        },
        getCode: function () {
            var _0x9e20x16 = "";
            if (this["opts"]["visual"]) {
                _0x9e20x16 = this["$editor"]["html"]();
            } else {
                _0x9e20x16 = this["$el"]["val"]();
            };
            return this["stripTags"](_0x9e20x16);
        },
        insertHtml: function (_0x9e20x16) {
            this["$editor"]["focus"]();
            this["pasteHtmlAtCaret"](_0x9e20x16);
            this["observeImages"]();
            this["syncCode"]();
        },
        pasteHtmlAtCaret: function (_0x9e20x16) {
            var _0x9e20x26, _0x9e20x27;
            if (this["document"]["getSelection"]) {
                _0x9e20x26 = this["window"]["getSelection"]();
                if (_0x9e20x26["getRangeAt"] && _0x9e20x26["rangeCount"]) {
                    _0x9e20x27 = _0x9e20x26["getRangeAt"](0);
                    _0x9e20x27["deleteContents"]();
                    var _0x9e20x28 = this["document"]["createElement"]("div");
                    _0x9e20x28["innerHTML"] = _0x9e20x16;
                    var _0x9e20x14 = this["document"]["createDocumentFragment"](),
                        _0x9e20x29, _0x9e20x2a;
                    while (_0x9e20x29 = _0x9e20x28["firstChild"]) {
                        _0x9e20x2a = _0x9e20x14["appendChild"](_0x9e20x29);
                    };
                    _0x9e20x27["insertNode"](_0x9e20x14);
                    if (_0x9e20x2a) {
                        _0x9e20x27 = _0x9e20x27["cloneRange"]();
                        _0x9e20x27["setStartAfter"](_0x9e20x2a);
                        _0x9e20x27["collapse"](true);
                        _0x9e20x26["removeAllRanges"]();
                        _0x9e20x26["addRange"](_0x9e20x27);
                    };
                };
            } else {
                if (this["document"]["selection"] && this["document"]["selection"]["type"] != "Control") {
                    this["document"]["selection"]["createRange"]()["pasteHTML"](_0x9e20x16);
                };
            };
        },
        destroy: function () {
            var _0x9e20x16 = this["getCode"]();
            if (this["textareamode"]) {
                this["$box"]["after"](this.$el);
                this["$box"]["remove"]();
                this["$el"]["height"](this["height"])["val"](_0x9e20x16)["show"]();
            } else {
                this["$box"]["after"](this.$editor);
                this["$box"]["remove"]();
                this["$editor"]["removeClass"]("redactor_editor")["removeClass"]("redactor_editor_wym")["attr"]("contenteditable", false)["html"](_0x9e20x16)["show"]();
            }; if (this["opts"]["toolbarExternal"]) {
                _0x9e20x4(this["opts"]["toolbarExternal"])["empty"]();
            };
            _0x9e20x4(".redactor_air")["remove"]();
            for (var _0x9e20xd = 0; _0x9e20xd < this["dropdowns"]["length"]; _0x9e20xd++) {
                this["dropdowns"][_0x9e20xd]["remove"]();
                delete(this["dropdowns"][_0x9e20xd]);
            };
            if (this["opts"]["autosave"] !== false) {
                clearInterval(this["autosaveInterval"]);
            };
        },
        observeFormatting: function () {
            var _0x9e20x19 = this["getCurrentNode"]();
            this["inactiveAllButtons"]();
            _0x9e20x4["each"](this["opts"]["activeButtonsStates"], _0x9e20x4["proxy"](function (_0x9e20xd, _0x9e20xe) {
                if (_0x9e20x4(_0x9e20x19)["closest"](_0x9e20xd, this["$editor"]["get"]()[0])["length"] != 0) {
                    this["setBtnActive"](_0x9e20xe);
                };
            }, this));
            var _0x9e20x2b = _0x9e20x4(_0x9e20x19)["closest"](["p", "div", "h1", "h2", "h3", "h4", "h5", "h6", "blockquote", "td"]);
            if (typeof _0x9e20x2b[0] !== "undefined" && typeof _0x9e20x2b[0]["elem"] !== "undefined" && _0x9e20x4(_0x9e20x2b[0]["elem"])["size"]() != 0) {
                var _0x9e20x2c = _0x9e20x4(_0x9e20x2b[0]["elem"])["css"]("text-align");
                switch (_0x9e20x2c) {
                case "right":
                    this["setBtnActive"]("alignright");
                    break;;
                case "center":
                    this["setBtnActive"]("aligncenter");
                    break;;
                case "justify":
                    this["setBtnActive"]("justify");
                    break;;
                default:
                    this["setBtnActive"]("alignleft");
                    break;;
                };
            };
        },
        observeImages: function () {
            if (this["opts"]["observeImages"] === false) {
                return false;
            };
            this["$editor"]["find"]("img")["each"](_0x9e20x4["proxy"](function (_0x9e20xd, _0x9e20xe) {
                if (this["browser"]("msie")) {
                    _0x9e20x4(_0x9e20xe)["attr"]("unselectable", "on");
                };
                this["resizeImage"](_0x9e20xe);
            }, this));
        },
        observeTables: function () {
            this["$editor"]["find"]("table")["click"](_0x9e20x4["proxy"](this["tableObserver"], this));
        },
        observeScroll: function () {
            var _0x9e20x2d = _0x9e20x4(this["document"])["scrollTop"]();
            var _0x9e20x2e = this["$box"]["offset"]()["top"];
            var _0x9e20x24 = 0;
            if (_0x9e20x2d > _0x9e20x2e) {
                var _0x9e20x23 = "100%";
                if (this["opts"]["fixedBox"]) {
                    _0x9e20x24 = this["$box"]["offset"]()["left"];
                    _0x9e20x23 = this["$box"]["innerWidth"]();
                };
                this["fixed"] = true;
                this["$toolbar"]["css"]({
                    position: "fixed",
                    width: _0x9e20x23,
                    zIndex: 1005,
                    top: this["opts"]["fixedTop"] + "px",
                    left: _0x9e20x24
                });
            } else {
                this["fixed"] = false;
                this["$toolbar"]["css"]({
                    position: "relative",
                    width: "auto",
                    zIndex: 1,
                    top: 0,
                    left: _0x9e20x24
                });
            };
        },
        setBuffer: function () {
            this["saveSelection"]();
            this["opts"]["buffer"] = this["$editor"]["html"]();
        },
        getBuffer: function () {
            if (this["opts"]["buffer"] === false) {
                return false;
            };
            this["$editor"]["html"](this["opts"]["buffer"]);
            if (!this["browser"]("msie")) {
                this["restoreSelection"]();
            };
            this["opts"]["buffer"] = false;
        },
        execCommand: function (_0x9e20x17, _0x9e20x2f) {
            if (this["opts"]["visual"] == false) {
                this["$el"]["focus"]();
                return false;
            };
            try {
                var _0x9e20x19;
                if (_0x9e20x17 === "inserthtml") {
                    if (this["browser"]("msie")) {
                        this["$editor"]["focus"]();
                        this["document"]["selection"]["createRange"]()["pasteHTML"](_0x9e20x2f);
                    } else {
                        this["pasteHtmlAtCaret"](_0x9e20x2f);
                    };
                    this["observeImages"]();
                } else {
                    if (_0x9e20x17 === "unlink") {
                        _0x9e20x19 = this["getParentNode"]();
                        if (_0x9e20x4(_0x9e20x19)["get"](0)["tagName"] === "A") {
                            _0x9e20x4(_0x9e20x19)["replaceWith"](_0x9e20x4(_0x9e20x19)["text"]());
                        } else {
                            this["execRun"](_0x9e20x17, _0x9e20x2f);
                        };
                    } else {
                        if (_0x9e20x17 === "JustifyLeft" || _0x9e20x17 === "JustifyCenter" || _0x9e20x17 === "JustifyRight" || _0x9e20x17 === "JustifyFull") {
                            _0x9e20x19 = this["getCurrentNode"]();
                            var _0x9e20x2b = _0x9e20x4(_0x9e20x19)["get"](0)["tagName"];
                            if (this["opts"]["iframe"] === false && _0x9e20x4(_0x9e20x19)["parents"](".redactor_editor")["size"]() == 0) {
                                return false;
                            };
                            var _0x9e20x30 = ["P", "DIV", "H1", "H2", "H3", "H4", "H5", "H6", "BLOCKQUOTE", "TD"];
                            if (_0x9e20x4["inArray"](_0x9e20x2b, _0x9e20x30) != -1) {
                                var _0x9e20x2c = false;
                                if (_0x9e20x17 === "JustifyCenter") {
                                    _0x9e20x2c = "center";
                                } else {
                                    if (_0x9e20x17 === "JustifyRight") {
                                        _0x9e20x2c = "right";
                                    } else {
                                        if (_0x9e20x17 === "JustifyFull") {
                                            _0x9e20x2c = "justify";
                                        };
                                    };
                                }; if (_0x9e20x2c === false) {
                                    _0x9e20x4(_0x9e20x19)["css"]("text-align", "");
                                } else {
                                    _0x9e20x4(_0x9e20x19)["css"]("text-align", _0x9e20x2c);
                                };
                            } else {
                                this["execRun"](_0x9e20x17, _0x9e20x2f);
                            };
                        } else {
                            if (_0x9e20x17 === "formatblock" && _0x9e20x2f === "blockquote") {
                                _0x9e20x19 = this["getCurrentNode"]();
                                if (_0x9e20x4(_0x9e20x19)["get"](0)["tagName"] === "BLOCKQUOTE") {
                                    if (this["browser"]("msie")) {
                                        var _0x9e20x29 = _0x9e20x4("<p>" + _0x9e20x4(_0x9e20x19)["html"]() + "</p>");
                                        _0x9e20x4(_0x9e20x19)["replaceWith"](_0x9e20x29);
                                    } else {
                                        this["execRun"](_0x9e20x17, "p");
                                    };
                                } else {
                                    if (_0x9e20x4(_0x9e20x19)["get"](0)["tagName"] === "P") {
                                        var _0x9e20x31 = _0x9e20x4(_0x9e20x19)["parent"]();
                                        if (_0x9e20x4(_0x9e20x31)["get"](0)["tagName"] === "BLOCKQUOTE") {
                                            var _0x9e20x29 = _0x9e20x4("<p>" + _0x9e20x4(_0x9e20x19)["html"]() + "</p>");
                                            _0x9e20x4(_0x9e20x31)["replaceWith"](_0x9e20x29);
                                            this["setSelection"](_0x9e20x29[0], 0, _0x9e20x29[0], 0);
                                        } else {
                                            if (this["browser"]("msie")) {
                                                var _0x9e20x29 = _0x9e20x4("<blockquote>" + _0x9e20x4(_0x9e20x19)["html"]() + "</blockquote>");
                                                _0x9e20x4(_0x9e20x19)["replaceWith"](_0x9e20x29);
                                            } else {
                                                this["execRun"](_0x9e20x17, _0x9e20x2f);
                                            };
                                        };
                                    } else {
                                        this["execRun"](_0x9e20x17, _0x9e20x2f);
                                    };
                                };
                            } else {
                                if (_0x9e20x17 === "formatblock" && (_0x9e20x2f === "pre" || _0x9e20x2f === "p")) {
                                    _0x9e20x19 = this["getParentNode"]();
                                    if (_0x9e20x4(_0x9e20x19)["get"](0)["tagName"] === "PRE") {
                                        _0x9e20x4(_0x9e20x19)["replaceWith"]("<p>" + this["encodeEntities"](_0x9e20x4(_0x9e20x19)["text"]()) + "</p>");
                                    } else {
                                        this["execRun"](_0x9e20x17, _0x9e20x2f);
                                    };
                                } else {
                                    if (_0x9e20x17 === "inserthorizontalrule" && this["browser"]("msie")) {
                                        this["$editor"]["focus"]();
                                    };
                                    if (_0x9e20x17 === "formatblock" && this["browser"]("mozilla")) {
                                        this["$editor"]["focus"]();
                                    };
                                    this["execRun"](_0x9e20x17, _0x9e20x2f);
                                };
                            };
                        };
                    };
                }; if (_0x9e20x17 === "inserthorizontalrule") {
                    this["$editor"]["find"]("hr")["removeAttr"]("id");
                };
                this["syncCode"]();
                if (this["oldIE"]()) {
                    this["$editor"]["focus"]();
                };
                if (typeof this["opts"]["execCommandCallback"] === "function") {
                    this["opts"]["execCommandCallback"](this, _0x9e20x17);
                };
                if (this["opts"]["air"]) {
                    this["air"]["hide"]();
                };
            } catch (e) {};
        },
        execRun: function (_0x9e20x17, _0x9e20x2f) {
            if (_0x9e20x17 === "formatblock" && this["browser"]("msie")) {
                _0x9e20x2f = "<" + _0x9e20x2f + ">";
            };
            this["document"]["execCommand"](_0x9e20x17, false, _0x9e20x2f);
        },
        formatNewLine: function (_0x9e20x13) {
            var _0x9e20x19 = this["getParentNode"]();
            if (_0x9e20x19["nodeName"] === "DIV" && _0x9e20x19["className"] === "redactor_editor") {
                var _0x9e20x9 = _0x9e20x4(this["getCurrentNode"]());
                if (_0x9e20x9["get"](0)["tagName"] === "DIV" && (_0x9e20x9["html"]() === "" || _0x9e20x9["html"]() === "<br>")) {
                    var _0x9e20x32 = _0x9e20x4("<p>")["append"](_0x9e20x9["clone"]()["get"](0)["childNodes"]);
                    _0x9e20x9["replaceWith"](_0x9e20x32);
                    _0x9e20x32["html"]("<br />");
                    this["setSelection"](_0x9e20x32[0], 0, _0x9e20x32[0], 0);
                };
            };
        },
        safariShiftKeyEnter: function (_0x9e20x13, _0x9e20x18) {
            if (_0x9e20x13["shiftKey"] && _0x9e20x18 === 13) {
                _0x9e20x13["preventDefault"]();
                this["insertNodeAtCaret"](_0x9e20x4("<span><br /></span>")["get"](0));
                this["syncCode"]();
                return false;
            } else {
                return true;
            };
        },
        formatEmpty: function (_0x9e20x13) {
            var _0x9e20x16 = _0x9e20x4["trim"](this["$editor"]["html"]());
            _0x9e20x16 = _0x9e20x16["replace"](/<br\s?\/?>/i, "");
            var _0x9e20x33 = _0x9e20x16["replace"](/<p>\s?<\/p>/gi, "");
            if (_0x9e20x16 === "" || _0x9e20x33 === "") {
                _0x9e20x13["preventDefault"]();
                var _0x9e20x29 = _0x9e20x4(this["opts"]["emptyHtml"])["get"](0);
                this["$editor"]["html"](_0x9e20x29);
                this["setSelection"](_0x9e20x29, 0, _0x9e20x29, 0);
                this["syncCode"]();
                return false;
            } else {
                this["syncCode"]();
            };
        },
        paragraphy: function (_0x9e20x34) {
            _0x9e20x34 = _0x9e20x4["trim"](_0x9e20x34);
            if (_0x9e20x34 === "" || _0x9e20x34 === "<p></p>") {
                return this["opts"]["emptyHtml"];
            };
            if (this["opts"]["convertDivs"]) {
                _0x9e20x34 = _0x9e20x34["replace"](/<div(.*?)>([\w\W]*?)<\/div>/gi, "<p>$2</p>");
            };
            var _0x9e20x35 = function (_0x9e20x36, _0x9e20x37, _0x9e20x38) {
                return _0x9e20x36["replace"](new RegExp(_0x9e20x37, "g"), _0x9e20x38);
            };
            var _0x9e20x39 = function (_0x9e20x37, _0x9e20x38) {
                return _0x9e20x35(_0x9e20x34, _0x9e20x37, _0x9e20x38);
            };
            var _0x9e20x3a = "(table|thead|tfoot|caption|colgroup|tbody|tr|td|th|div|dl|dd|dt|ul|ol|li|pre|select|form|blockquote|address|math|style|script|object|input|param|p|h[1-6])";
            _0x9e20x34 += "\x0A";
            _0x9e20x39("<br />\\s*<br />", "\x0A\x0A");
            _0x9e20x39("(<" + _0x9e20x3a + "[^>]*>)", "\x0A$1");
            _0x9e20x39("(</" + _0x9e20x3a + ">)", "$1\x0A\x0A");
            _0x9e20x39("\x0D\x0A|\x0D", "\x0A");
            _0x9e20x39("\x0A\x0A+", "\x0A\x0A");
            _0x9e20x39("\x0A?((.|\x0A)+?)$", "<p>$1</p>\x0A");
            _0x9e20x39("<p>\\s*?</p>", "");
            _0x9e20x39("<p>(<div[^>]*>\\s*)", "$1<p>");
            _0x9e20x39("<p>([^<]+)\\s*?(</(div|address|form)[^>]*>)", "<p>$1</p>$2");
            _0x9e20x39("<p>\\s*(</?" + _0x9e20x3a + "[^>]*>)\\s*</p>", "$1");
            _0x9e20x39("<p>(<li.+?)</p>", "$1");
            _0x9e20x39("<p>\\s*(</?" + _0x9e20x3a + "[^>]*>)", "$1");
            _0x9e20x39("(</?" + _0x9e20x3a + "[^>]*>)\\s*</p>", "$1");
            _0x9e20x39("(</?" + _0x9e20x3a + "[^>]*>)\\s*<br />", "$1");
            _0x9e20x39("<br />(\\s*</?(p|li|div|dl|dd|dt|th|pre|td|ul|ol)[^>]*>)", "$1");
            if (_0x9e20x34["indexOf"]("<pre") != -1) {
                _0x9e20x39("(<pre(.|\x0A)*?>)((.|\x0A)*?)</pre>", function (_0x9e20x3b, _0x9e20x3c, _0x9e20x3d, _0x9e20x3e) {
                    return _0x9e20x35(_0x9e20x3c, "\\\\([\'\"\\\\])", "$1") + _0x9e20x35(_0x9e20x35(_0x9e20x35(_0x9e20x3e, "<p>", "\x0A"), "</p>|<br />", ""), "\\\\([\'\"\\\\])", "$1") + "</pre>";
                });
            };
            return _0x9e20x39("\x0A</p>$", "</p>");
        },
        stripTags: function (_0x9e20x16) {
            var _0x9e20x3f = this["opts"]["allowedTags"];
            var _0x9e20x40 = /<\/?([a-z][a-z0-9]*)\b[^>]*>/gi;
            return _0x9e20x16["replace"](_0x9e20x40, function (_0x9e20x41, _0x9e20x42) {
                return _0x9e20x4["inArray"](_0x9e20x42["toLowerCase"](), _0x9e20x3f) > "-1" ? _0x9e20x41 : "";
            });
        },
        savePreCode: function (_0x9e20x16) {
            var _0x9e20x1b = _0x9e20x16["match"](/<pre(.*?)>([\w\W]*?)<\/pre>/gi);
            if (_0x9e20x1b !== null) {
                _0x9e20x4["each"](_0x9e20x1b, _0x9e20x4["proxy"](function (_0x9e20xd, _0x9e20xe) {
                    var _0x9e20x12 = _0x9e20xe["match"](/<pre(.*?)>([\w\W]*?)<\/pre>/i);
                    _0x9e20x12[2] = this["encodeEntities"](_0x9e20x12[2]);
                    _0x9e20x16 = _0x9e20x16["replace"](_0x9e20xe, "<pre" + _0x9e20x12[1] + ">" + _0x9e20x12[2] + "</pre>");
                }, this));
            };
            return _0x9e20x16;
        },
        encodeEntities: function (_0x9e20x34) {
            _0x9e20x34 = String(_0x9e20x34)["replace"](/&amp;/g, "&")["replace"](/&lt;/g, "<")["replace"](/&gt;/g, ">")["replace"](/&quot;/g, "\"");
            return String(_0x9e20x34)["replace"](/&/g, "&amp;")["replace"](/</g, "&lt;")["replace"](/>/g, "&gt;")["replace"](/"/g, "&quot;");
        },
        cleanupPre: function (_0x9e20xe) {
            _0x9e20xe = _0x9e20xe["replace"](/<br>/gi, "\x0A");
            _0x9e20xe = _0x9e20xe["replace"](/<\/p>/gi, "\x0A");
            _0x9e20xe = _0x9e20xe["replace"](/<\/div>/gi, "\x0A");
            var _0x9e20x43 = this["document"]["createElement"]("div");
            _0x9e20x43["innerHTML"] = _0x9e20xe;
            return _0x9e20x43["textContent"] || _0x9e20x43["innerText"];
        },
        pasteCleanUp: function (_0x9e20x16) {
            var _0x9e20x19 = this["getParentNode"]();
            if (_0x9e20x4(_0x9e20x19)["get"](0)["tagName"] === "PRE") {
                _0x9e20x16 = this["cleanupPre"](_0x9e20x16);
                this["pasteCleanUpInsert"](_0x9e20x16);
                return true;
            };
            _0x9e20x16 = _0x9e20x16["replace"](/<!--[\s\S]*?-->|<\?(?:php)?[\s\S]*?\?>/gi, "");
            _0x9e20x16 = _0x9e20x16["replace"](/(&nbsp;){2,}/gi, "&nbsp;");
            _0x9e20x16 = _0x9e20x16["replace"](/<b\sid="internal-source-marker(.*?)">([\w\W]*?)<\/b>/gi, "$2");
            _0x9e20x16 = this["stripTags"](_0x9e20x16);
            _0x9e20x16 = _0x9e20x16["replace"](/<td><\/td>/gi, "[td]");
            _0x9e20x16 = _0x9e20x16["replace"](/<td>&nbsp;<\/td>/gi, "[td]");
            _0x9e20x16 = _0x9e20x16["replace"](/<td><br><\/td>/gi, "[td]");
            _0x9e20x16 = _0x9e20x16["replace"](/<a(.*?)href="(.*?)"(.*?)>([\w\W]*?)<\/a>/gi, "[a href=\"$2\"]$4[/a]");
            _0x9e20x16 = _0x9e20x16["replace"](/<iframe(.*?)>([\w\W]*?)<\/iframe>/gi, "[iframe$1]$2[/iframe]");
            _0x9e20x16 = _0x9e20x16["replace"](/<video(.*?)>([\w\W]*?)<\/video>/gi, "[video$1]$2[/video]");
            _0x9e20x16 = _0x9e20x16["replace"](/<audio(.*?)>([\w\W]*?)<\/audio>/gi, "[audio$1]$2[/audio]");
            _0x9e20x16 = _0x9e20x16["replace"](/<embed(.*?)>([\w\W]*?)<\/embed>/gi, "[embed$1]$2[/embed]");
            _0x9e20x16 = _0x9e20x16["replace"](/<object(.*?)>([\w\W]*?)<\/object>/gi, "[object$1]$2[/object]");
            _0x9e20x16 = _0x9e20x16["replace"](/<param(.*?)>/gi, "[param$1]");
            _0x9e20x16 = _0x9e20x16["replace"](/<img(.*?)style="(.*?)"(.*?)>/gi, "[img$1$3]");
            _0x9e20x16 = _0x9e20x16["replace"](/<(\w+)([\w\W]*?)>/gi, "<$1>");
            _0x9e20x16 = _0x9e20x16["replace"](/<[^\/>][^>]*>(\s*|\t*|\n*|&nbsp;|<br>)<\/[^>]+>/gi, "");
            _0x9e20x16 = _0x9e20x16["replace"](/<[^\/>][^>]*>(\s*|\t*|\n*|&nbsp;|<br>)<\/[^>]+>/gi, "");
            _0x9e20x16 = _0x9e20x16["replace"](/\[td\]/gi, "<td>&nbsp;</td>");
            _0x9e20x16 = _0x9e20x16["replace"](/\[a href="(.*?)"\]([\w\W]*?)\[\/a\]/gi, "<a href=\"$1\">$2</a>");
            _0x9e20x16 = _0x9e20x16["replace"](/\[iframe(.*?)\]([\w\W]*?)\[\/iframe\]/gi, "<iframe$1>$2</iframe>");
            _0x9e20x16 = _0x9e20x16["replace"](/\[video(.*?)\]([\w\W]*?)\[\/video\]/gi, "<video$1>$2</video>");
            _0x9e20x16 = _0x9e20x16["replace"](/\[audio(.*?)\]([\w\W]*?)\[\/audio\]/gi, "<audio$1>$2</audio>");
            _0x9e20x16 = _0x9e20x16["replace"](/\[embed(.*?)\]([\w\W]*?)\[\/embed\]/gi, "<embed$1>$2</embed>");
            _0x9e20x16 = _0x9e20x16["replace"](/\[object(.*?)\]([\w\W]*?)\[\/object\]/gi, "<object$1>$2</object>");
            _0x9e20x16 = _0x9e20x16["replace"](/\[param(.*?)\]/gi, "<param$1>");
            _0x9e20x16 = _0x9e20x16["replace"](/\[img(.*?)\]/gi, "<img$1>");
            if (this["opts"]["convertDivs"]) {
                _0x9e20x16 = _0x9e20x16["replace"](/<div(.*?)>([\w\W]*?)<\/div>/gi, "<p>$2</p>");
            };
            _0x9e20x16 = _0x9e20x16["replace"](/<span>([\w\W]*?)<\/span>/gi, "$1");
            _0x9e20x16 = _0x9e20x16["replace"](/\n{3,}/gi, "\x0A");
            _0x9e20x16 = _0x9e20x16["replace"](/<p><p>/gi, "<p>");
            _0x9e20x16 = _0x9e20x16["replace"](/<\/p><\/p>/gi, "</p>");
            if (this["browser"]("mozilla")) {
                _0x9e20x16 = _0x9e20x16["replace"](/<br>$/gi, "");
            };
            this["pasteCleanUpInsert"](_0x9e20x16);
        },
        pasteCleanUpInsert: function (_0x9e20x16) {
            this["execCommand"]("inserthtml", _0x9e20x16);
            if (this["opts"]["autoresize"] === true) {
                _0x9e20x4(this["document"]["body"])["scrollTop"](this["saveScroll"]);
            } else {
                this["$editor"]["scrollTop"](this["saveScroll"]);
            };
        },
        formattingRemove: function (_0x9e20x16) {
            var _0x9e20x44 = [];
            var _0x9e20x1b = _0x9e20x16["match"](/<pre(.*?)>([\w\W]*?)<\/pre>/gi);
            if (_0x9e20x1b !== null) {
                _0x9e20x4["each"](_0x9e20x1b, function (_0x9e20xd, _0x9e20xe) {
                    _0x9e20x16 = _0x9e20x16["replace"](_0x9e20xe, "prebuffer_" + _0x9e20xd);
                    _0x9e20x44["push"](_0x9e20xe);
                });
            };
            _0x9e20x16 = _0x9e20x16["replace"](/\s{2,}/g, " ");
            _0x9e20x16 = _0x9e20x16["replace"](/\n/g, " ");
            _0x9e20x16 = _0x9e20x16["replace"](/[\t]*/g, "");
            _0x9e20x16 = _0x9e20x16["replace"](/\n\s*\n/g, "\x0A");
            _0x9e20x16 = _0x9e20x16["replace"](/^[\s\n]*/g, "");
            _0x9e20x16 = _0x9e20x16["replace"](/[\s\n]*$/g, "");
            _0x9e20x16 = _0x9e20x16["replace"](/>\s+</g, "><");
            if (_0x9e20x44) {
                _0x9e20x4["each"](_0x9e20x44, function (_0x9e20xd, _0x9e20xe) {
                    _0x9e20x16 = _0x9e20x16["replace"]("prebuffer_" + _0x9e20xd, _0x9e20xe);
                });
                _0x9e20x44 = [];
            };
            return _0x9e20x16;
        },
        formattingIndenting: function (_0x9e20x16) {
            _0x9e20x16 = _0x9e20x16["replace"](/<li/g, "\x09<li");
            _0x9e20x16 = _0x9e20x16["replace"](/<tr/g, "\x09<tr");
            _0x9e20x16 = _0x9e20x16["replace"](/<td/g, "\x09\x09<td");
            _0x9e20x16 = _0x9e20x16["replace"](/<\/tr>/g, "\x09</tr>");
            return _0x9e20x16;
        },
        formattingEmptyTags: function (_0x9e20x16) {
            var _0x9e20x45 = ["<pre></pre>", "<blockquote>\\s*</blockquote>", "<em>\\s*</em>", "<ul></ul>", "<ol></ol>", "<li></li>", "<table></table>", "<tr></tr>", "<span>\\s*<span>", "<span>&nbsp;<span>", "<b>\\s*</b>", "<b>&nbsp;</b>", "<p>\\s*</p>", "<p>&nbsp;</p>", "<p>\\s*<br>\\s*</p>", "<div>\\s*</div>", "<div>\\s*<br>\\s*</div>"];
            for (var _0x9e20xd = 0; _0x9e20xd < _0x9e20x45["length"]; ++_0x9e20xd) {
                var _0x9e20x46 = _0x9e20x45[_0x9e20xd];
                _0x9e20x16 = _0x9e20x16["replace"](new RegExp(_0x9e20x46, "gi"), "");
            };
            return _0x9e20x16;
        },
        formattingAddBefore: function (_0x9e20x16) {
            var _0x9e20x47 = "\x0D\x0A";
            var _0x9e20x48 = ["<p", "<form", "</ul>", "</ol>", "<fieldset", "<legend", "<object", "<embed", "<select", "<option", "<input", "<textarea", "<pre", "<blockquote", "<ul", "<ol", "<li", "<dl", "<dt", "<dd", "<table", "<thead", "<tbody", "<caption", "</caption>", "<th", "<tr", "<td", "<figure"];
            for (var _0x9e20xd = 0; _0x9e20xd < _0x9e20x48["length"]; ++_0x9e20xd) {
                var _0x9e20x49 = _0x9e20x48[_0x9e20xd];
                _0x9e20x16 = _0x9e20x16["replace"](new RegExp(_0x9e20x49, "gi"), _0x9e20x47 + _0x9e20x49);
            };
            return _0x9e20x16;
        },
        formattingAddAfter: function (_0x9e20x16) {
            var _0x9e20x47 = "\x0D\x0A";
            var _0x9e20x4a = ["</p>", "</div>", "</h1>", "</h2>", "</h3>", "</h4>", "</h5>", "</h6>", "<br>", "<br />", "</dl>", "</dt>", "</dd>", "</form>", "</blockquote>", "</pre>", "</legend>", "</fieldset>", "</object>", "</embed>", "</textarea>", "</select>", "</option>", "</table>", "</thead>", "</tbody>", "</tr>", "</td>", "</th>", "</figure>"];
            for (var _0x9e20xd = 0; _0x9e20xd < _0x9e20x4a["length"]; ++_0x9e20xd) {
                var _0x9e20x4b = _0x9e20x4a[_0x9e20xd];
                _0x9e20x16 = _0x9e20x16["replace"](new RegExp(_0x9e20x4b, "gi"), _0x9e20x4b + _0x9e20x47);
            };
            return _0x9e20x16;
        },
        formatting: function (_0x9e20x16) {
            _0x9e20x16 = this["formattingRemove"](_0x9e20x16);
            _0x9e20x16 = this["formattingEmptyTags"](_0x9e20x16);
            _0x9e20x16 = this["formattingAddBefore"](_0x9e20x16);
            _0x9e20x16 = this["formattingAddAfter"](_0x9e20x16);
            _0x9e20x16 = this["formattingIndenting"](_0x9e20x16);
            return _0x9e20x16;
        },
        toggle: function () {
            var _0x9e20x16;
            if (this["opts"]["visual"]) {
                var _0x9e20x4c = this["$editor"]["innerHeight"]();
                this["$editor"]["hide"]();
                this["$content"]["hide"]();
                _0x9e20x16 = this["$editor"]["html"]();
                this["$el"]["height"](_0x9e20x4c)["val"](_0x9e20x16)["show"]()["focus"]();
                this["setBtnActive"]("html");
                this["opts"]["visual"] = false;
            } else {
                this["$el"]["hide"]();
                var _0x9e20x16 = this["$el"]["val"]();
                this["$editor"]["html"](_0x9e20x16)["show"]();
                this["$content"]["show"]();
                if (this["$editor"]["html"]() === "") {
                    this["setCode"](this["opts"]["emptyHtml"]);
                };
                this["$editor"]["focus"]();
                this["setBtnInactive"]("html");
                this["opts"]["visual"] = true;
                this["observeImages"]();
                this["observeTables"]();
            };
        },
        autoSave: function () {
            this["autosaveInterval"] = setInterval(_0x9e20x4["proxy"](function () {
                _0x9e20x4["ajax"]({
                    url: this["opts"]["autosave"],
                    type: "post",
                    data: this["$el"]["attr"]("name") + "=" + escape(encodeURIComponent(this["getCode"]())),
                    success: _0x9e20x4["proxy"](function (_0x9e20x7) {
                        if (typeof this["opts"]["autosaveCallback"] === "function") {
                            this["opts"]["autosaveCallback"](_0x9e20x7, this);
                        };
                    }, this)
                });
            }, this), this["opts"]["interval"] * 1000);
        },
        buildToolbar: function () {
            if (this["opts"]["toolbar"] === false) {
                return false;
            };
            this["$toolbar"] = _0x9e20x4("<ul>")["addClass"]("redactor_toolbar");
            if (this["opts"]["air"]) {
                _0x9e20x4(this["air"])["append"](this.$toolbar);
                _0x9e20x4("body")["append"](this["air"]);
            } else {
                if (this["opts"]["toolbarExternal"] === false) {
                    this["$box"]["prepend"](this.$toolbar);
                } else {
                    _0x9e20x4(this["opts"]["toolbarExternal"])["html"](this.$toolbar);
                };
            };
            _0x9e20x4["each"](this["opts"]["buttons"], _0x9e20x4["proxy"](function (_0x9e20xd, _0x9e20x18) {
                if (_0x9e20x18 !== "|" && typeof this["opts"]["toolbar"][_0x9e20x18] !== "undefined") {
                    var _0x9e20xe = this["opts"]["toolbar"][_0x9e20x18];
                    if (this["opts"]["fileUpload"] === false && _0x9e20x18 === "file") {
                        return true;
                    };
                    this["$toolbar"]["append"](_0x9e20x4("<li>")["append"](this["buildButton"](_0x9e20x18, _0x9e20xe)));
                };
                if (_0x9e20x18 === "|") {
                    this["$toolbar"]["append"](_0x9e20x4("<li class=\"redactor_separator\"></li>"));
                };
            }, this));
        },
        buildButton: function (_0x9e20x18, _0x9e20xe) {
            var _0x9e20x4d = _0x9e20x4("<a href=\"javascript:void(null);\" title=\"" + _0x9e20xe["title"] + "\" class=\"redactor_btn_" + _0x9e20x18 + "\"></a>");
            if (typeof _0x9e20xe["func"] === "undefined") {
                _0x9e20x4d["click"](_0x9e20x4["proxy"](function () {
                    if (_0x9e20x4["inArray"](_0x9e20x18, this["opts"]["activeButtons"]) != -1) {
                        this["inactiveAllButtons"]();
                        this["setBtnActive"](_0x9e20x18);
                    };
                    if (this["browser"]("mozilla")) {
                        this["$editor"]["focus"]();
                    };
                    this["execCommand"](_0x9e20xe["exec"], _0x9e20x18);
                }, this));
            } else {
                if (_0x9e20xe["func"] !== "show") {
                    _0x9e20x4d["click"](_0x9e20x4["proxy"](function (_0x9e20x13) {
                        this[_0x9e20xe["func"]](_0x9e20x13);
                    }, this));
                };
            }; if (typeof _0x9e20xe["callback"] !== "undefined" && _0x9e20xe["callback"] !== false) {
                _0x9e20x4d["click"](_0x9e20x4["proxy"](function (_0x9e20x13) {
                    _0x9e20xe["callback"](this, _0x9e20x13, _0x9e20x18);
                }, this));
            };
            if (_0x9e20x18 === "backcolor" || _0x9e20x18 === "fontcolor" || typeof (_0x9e20xe["dropdown"]) !== "undefined") {
                var _0x9e20x4e = _0x9e20x4("<div class=\"redactor_dropdown\" style=\"display: none;\">");
                if (_0x9e20x18 === "backcolor" || _0x9e20x18 === "fontcolor") {
                    _0x9e20x4e = this["buildColorPicker"](_0x9e20x4e, _0x9e20x18);
                } else {
                    _0x9e20x4e = this["buildDropdown"](_0x9e20x4e, _0x9e20xe["dropdown"]);
                };
                this["dropdowns"]["push"](_0x9e20x4e["appendTo"](_0x9e20x4(document["body"])));
                this["hdlShowDropDown"] = _0x9e20x4["proxy"](function (_0x9e20x13) {
                    this["showDropDown"](_0x9e20x13, _0x9e20x4e, _0x9e20x18);
                }, this);
                _0x9e20x4d["click"](this["hdlShowDropDown"]);
            };
            return _0x9e20x4d;
        },
        buildDropdown: function (_0x9e20x4e, _0x9e20x4f) {
            _0x9e20x4["each"](_0x9e20x4f, _0x9e20x4["proxy"](function (_0x9e20x36, _0x9e20x50) {
                if (typeof (_0x9e20x50["className"]) === "undefined") {
                    _0x9e20x50["className"] = "";
                };
                var _0x9e20x51;
                if (typeof _0x9e20x50["name"] !== "undefined" && _0x9e20x50["name"] === "separator") {
                    _0x9e20x51 = _0x9e20x4("<a class=\"redactor_separator_drop\">");
                } else {
                    _0x9e20x51 = _0x9e20x4("<a href=\"javascript:void(null);\" class=\"" + _0x9e20x50["className"] + "\">" + _0x9e20x50["title"] + "</a>");
                    if (typeof (_0x9e20x50["callback"]) === "function") {
                        _0x9e20x4(_0x9e20x51)["click"](_0x9e20x4["proxy"](function (_0x9e20x13) {
                            _0x9e20x50["callback"](this, _0x9e20x13, _0x9e20x36);
                        }, this));
                    } else {
                        if (typeof (_0x9e20x50["func"]) === "undefined") {
                            _0x9e20x4(_0x9e20x51)["click"](_0x9e20x4["proxy"](function () {
                                this["execCommand"](_0x9e20x50["exec"], _0x9e20x36);
                            }, this));
                        } else {
                            _0x9e20x4(_0x9e20x51)["click"](_0x9e20x4["proxy"](function (_0x9e20x13) {
                                this[_0x9e20x50["func"]](_0x9e20x13);
                            }, this));
                        };
                    };
                };
                _0x9e20x4(_0x9e20x4e)["append"](_0x9e20x51);
            }, this));
            return _0x9e20x4e;
        },
        buildColorPicker: function (_0x9e20x4e, _0x9e20x18) {
            var _0x9e20x52;
            if (_0x9e20x18 === "backcolor") {
                if (this["browser"]("msie")) {
                    _0x9e20x52 = "BackColor";
                } else {
                    _0x9e20x52 = "hilitecolor";
                };
            } else {
                _0x9e20x52 = "forecolor";
            };
            _0x9e20x4(_0x9e20x4e)["width"](210);
            var _0x9e20x53 = this["opts"]["colors"]["length"];
            for (var _0x9e20xd = 0; _0x9e20xd < _0x9e20x53; ++_0x9e20xd) {
                var _0x9e20x54 = this["opts"]["colors"][_0x9e20xd];
                var _0x9e20x55 = _0x9e20x4("<a rel=\"" + _0x9e20x54 + "\" href=\"javascript:void(null);\" class=\"redactor_color_link\"></a>")["css"]({
                    "backgroundColor": _0x9e20x54
                });
                _0x9e20x4(_0x9e20x4e)["append"](_0x9e20x55);
                var _0x9e20x56 = this;
                _0x9e20x4(_0x9e20x55)["click"](function () {
                    _0x9e20x56["execCommand"](_0x9e20x52, _0x9e20x4(this)["attr"]("rel"));
                    if (_0x9e20x52 === "forecolor") {
                        _0x9e20x56["$editor"]["find"]("font")["replaceWith"](function () {
                            return _0x9e20x4("<span style=\"color: " + _0x9e20x4(this)["attr"]("color") + ";\">" + _0x9e20x4(this)["html"]() + "</span>");
                        });
                    };
                    if (_0x9e20x56["browser"]("msie") && _0x9e20x52 === "BackColor") {
                        _0x9e20x56["$editor"]["find"]("font")["replaceWith"](function () {
                            return _0x9e20x4("<span style=\"" + _0x9e20x4(this)["attr"]("style") + "\">" + _0x9e20x4(this)["html"]() + "</span>");
                        });
                    };
                });
            };
            var _0x9e20x57 = _0x9e20x4("<a href=\"javascript:void(null);\" class=\"redactor_color_none\"></a>")["html"](RLANG["none"]);
            if (_0x9e20x18 === "backcolor") {
                _0x9e20x57["click"](_0x9e20x4["proxy"](this["setBackgroundNone"], this));
            } else {
                _0x9e20x57["click"](_0x9e20x4["proxy"](this["setColorNone"], this));
            };
            _0x9e20x4(_0x9e20x4e)["append"](_0x9e20x57);
            return _0x9e20x4e;
        },
        setBackgroundNone: function () {
            _0x9e20x4(this["getParentNode"]())["css"]("background-color", "transparent");
            this["syncCode"]();
        },
        setColorNone: function () {
            _0x9e20x4(this["getParentNode"]())["attr"]("color", "")["css"]("color", "");
            this["syncCode"]();
        },
        showDropDown: function (_0x9e20x13, _0x9e20x4e, _0x9e20x18) {
            if (this["getBtn"](_0x9e20x18)["hasClass"]("dropact")) {
                this["hideAllDropDown"]();
            } else {
                this["hideAllDropDown"]();
                this["setBtnActive"](_0x9e20x18);
                this["getBtn"](_0x9e20x18)["addClass"]("dropact");
                var _0x9e20x24 = this["getBtn"](_0x9e20x18)["offset"]()["left"];
                if (this["opts"]["air"]) {
                    var _0x9e20x58 = this["air"]["offset"]()["top"];
                    _0x9e20x4(_0x9e20x4e)["css"]({
                        position: "absolute",
                        left: _0x9e20x24 + "px",
                        top: _0x9e20x58 + 30 + "px"
                    })["show"]();
                } else {
                    if (this["opts"]["fixed"] && this["fixed"]) {
                        _0x9e20x4(_0x9e20x4e)["css"]({
                            position: "fixed",
                            left: _0x9e20x24 + "px",
                            top: "30px"
                        })["show"]();
                    } else {
                        var _0x9e20x25 = this["$toolbar"]["offset"]()["top"] + 30;
                        _0x9e20x4(_0x9e20x4e)["css"]({
                            position: "absolute",
                            left: _0x9e20x24 + "px",
                            top: _0x9e20x25 + "px"
                        })["show"]();
                    };
                };
            };
            var _0x9e20x59 = _0x9e20x4["proxy"](function (_0x9e20x13) {
                this["hideDropDown"](_0x9e20x13, _0x9e20x4e, _0x9e20x18);
            }, this);
            _0x9e20x4(document)["one"]("click", _0x9e20x59);
            this["$editor"]["one"]("click", _0x9e20x59);
            this["$content"]["one"]("click", _0x9e20x59);
            _0x9e20x13["stopPropagation"]();
        },
        hideAllDropDown: function () {
            this["$toolbar"]["find"]("a.dropact")["removeClass"]("redactor_act")["removeClass"]("dropact");
            _0x9e20x4(".redactor_dropdown")["hide"]();
        },
        hideDropDown: function (_0x9e20x13, _0x9e20x4e, _0x9e20x18) {
            if (!_0x9e20x4(_0x9e20x13["target"])["hasClass"]("dropact")) {
                _0x9e20x4(_0x9e20x4e)["removeClass"]("dropact");
                this["showedDropDown"] = false;
                this["hideAllDropDown"]();
            };
        },
        getBtn: function (_0x9e20x18) {
            if (this["opts"]["toolbar"] === false) {
                return false;
            };
            return _0x9e20x4(this["$toolbar"]["find"]("a.redactor_btn_" + _0x9e20x18));
        },
        setBtnActive: function (_0x9e20x18) {
            this["getBtn"](_0x9e20x18)["addClass"]("redactor_act");
        },
        setBtnInactive: function (_0x9e20x18) {
            this["getBtn"](_0x9e20x18)["removeClass"]("redactor_act");
        },
        inactiveAllButtons: function () {
            _0x9e20x4["each"](this["opts"]["activeButtons"], _0x9e20x4["proxy"](function (_0x9e20xd, _0x9e20xe) {
                this["setBtnInactive"](_0x9e20xe);
            }, this));
        },
        changeBtnIcon: function (_0x9e20x18, _0x9e20x5a) {
            this["getBtn"](_0x9e20x18)["addClass"]("redactor_btn_" + _0x9e20x5a);
        },
        removeBtnIcon: function (_0x9e20x18, _0x9e20x5a) {
            this["getBtn"](_0x9e20x18)["removeClass"]("redactor_btn_" + _0x9e20x5a);
        },
        addBtnSeparator: function () {
            this["$toolbar"]["append"](_0x9e20x4("<li class=\"redactor_separator\"></li>"));
        },
        addBtnSeparatorAfter: function (_0x9e20x18) {
            var _0x9e20x5b = this["getBtn"](_0x9e20x18);
            _0x9e20x5b["parent"]()["after"](_0x9e20x4("<li class=\"redactor_separator\"></li>"));
        },
        addBtnSeparatorBefore: function (_0x9e20x18) {
            var _0x9e20x5b = this["getBtn"](_0x9e20x18);
            _0x9e20x5b["parent"]()["before"](_0x9e20x4("<li class=\"redactor_separator\"></li>"));
        },
        removeBtnSeparatorAfter: function (_0x9e20x18) {
            var _0x9e20x5b = this["getBtn"](_0x9e20x18);
            _0x9e20x5b["parent"]()["next"]()["remove"]();
        },
        removeBtnSeparatorBefore: function (_0x9e20x18) {
            var _0x9e20x5b = this["getBtn"](_0x9e20x18);
            _0x9e20x5b["parent"]()["prev"]()["remove"]();
        },
        setBtnRight: function (_0x9e20x18) {
            if (this["opts"]["toolbar"] === false) {
                return false;
            };
            this["getBtn"](_0x9e20x18)["parent"]()["addClass"]("redactor_btn_right");
        },
        setBtnLeft: function (_0x9e20x18) {
            if (this["opts"]["toolbar"] === false) {
                return false;
            };
            this["getBtn"](_0x9e20x18)["parent"]()["removeClass"]("redactor_btn_right");
        },
        addBtn: function (_0x9e20x18, _0x9e20x5c, _0x9e20x5d, _0x9e20x4e) {
            if (this["opts"]["toolbar"] === false) {
                return false;
            };
            var _0x9e20x5e = this["buildButton"](_0x9e20x18, {
                title: _0x9e20x5c,
                callback: _0x9e20x5d,
                dropdown: _0x9e20x4e
            });
            this["$toolbar"]["append"](_0x9e20x4("<li>")["append"](_0x9e20x5e));
        },
        addBtnFirst: function (_0x9e20x18, _0x9e20x5c, _0x9e20x5d, _0x9e20x4e) {
            if (this["opts"]["toolbar"] === false) {
                return false;
            };
            var _0x9e20x5e = this["buildButton"](_0x9e20x18, {
                title: _0x9e20x5c,
                callback: _0x9e20x5d,
                dropdown: _0x9e20x4e
            });
            this["$toolbar"]["prepend"](_0x9e20x4("<li>")["append"](_0x9e20x5e));
        },
        addBtnAfter: function (_0x9e20x5f, _0x9e20x18, _0x9e20x5c, _0x9e20x5d, _0x9e20x4e) {
            if (this["opts"]["toolbar"] === false) {
                return false;
            };
            var _0x9e20x5e = this["buildButton"](_0x9e20x18, {
                title: _0x9e20x5c,
                callback: _0x9e20x5d,
                dropdown: _0x9e20x4e
            });
            var _0x9e20x5b = this["getBtn"](_0x9e20x5f);
            _0x9e20x5b["parent"]()["after"](_0x9e20x4("<li>")["append"](_0x9e20x5e));
        },
        addBtnBefore: function (_0x9e20x60, _0x9e20x18, _0x9e20x5c, _0x9e20x5d, _0x9e20x4e) {
            if (this["opts"]["toolbar"] === false) {
                return false;
            };
            var _0x9e20x5e = this["buildButton"](_0x9e20x18, {
                title: _0x9e20x5c,
                callback: _0x9e20x5d,
                dropdown: _0x9e20x4e
            });
            var _0x9e20x5b = this["getBtn"](_0x9e20x60);
            _0x9e20x5b["parent"]()["before"](_0x9e20x4("<li>")["append"](_0x9e20x5e));
        },
        removeBtn: function (_0x9e20x18, _0x9e20x61) {
            var _0x9e20x5b = this["getBtn"](_0x9e20x18);
            if (_0x9e20x61 === true) {
                _0x9e20x5b["parent"]()["next"]()["remove"]();
            };
            _0x9e20x5b["parent"]()["removeClass"]("redactor_btn_right");
            _0x9e20x5b["remove"]();
        },
        getFragmentHtml: function (_0x9e20x62) {
            var _0x9e20x63 = _0x9e20x62["cloneNode"](true);
            var _0x9e20x64 = this["document"]["createElement"]("div");
            _0x9e20x64["appendChild"](_0x9e20x63);
            return _0x9e20x64["innerHTML"];
        },
        extractContent: function () {
            var _0x9e20x29 = this["$editor"]["get"](0);
            var _0x9e20x14 = this["document"]["createDocumentFragment"](),
                _0x9e20x65;
            while ((_0x9e20x65 = _0x9e20x29["firstChild"])) {
                _0x9e20x14["appendChild"](_0x9e20x65);
            };
            return _0x9e20x14;
        },
        saveSelection: function () {
            this["$editor"]["focus"]();
            this["savedSel"] = this["getOrigin"]();
            this["savedSelObj"] = this["getFocus"]();
        },
        restoreSelection: function () {
            if (typeof this["savedSel"] !== "undefined" && this["savedSel"] !== null && this["savedSelObj"] !== null && this["savedSel"][0]["tagName"] !== "BODY") {
                if (this["opts"]["iframe"] === false && _0x9e20x4(this["savedSel"][0])["closest"](".redactor_editor")["size"]() == 0) {
                    this["$editor"]["focus"]();
                } else {
                    if (this["browser"]("opera")) {
                        this["$editor"]["focus"]();
                    };
                    this["setSelection"](this["savedSel"][0], this["savedSel"][1], this["savedSelObj"][0], this["savedSelObj"][1]);
                    if (this["browser"]("mozilla")) {
                        this["$editor"]["focus"]();
                    };
                };
            } else {
                this["$editor"]["focus"]();
            };
        },
        getSelection: function () {
            var _0x9e20x66 = this["document"];
            if (this["window"]["getSelection"]) {
                return this["window"]["getSelection"]();
            } else {
                if (_0x9e20x66["getSelection"]) {
                    return _0x9e20x66["getSelection"]();
                } else {
                    return _0x9e20x66["selection"]["createRange"]();
                };
            };
            return false;
        },
        hasSelection: function () {
            if (!this["oldIE"]()) {
                var _0x9e20x26;
                return (_0x9e20x26 = this["getSelection"]()) && (_0x9e20x26["focusNode"] != null) && (_0x9e20x26["anchorNode"] != null);
            } else {
                var _0x9e20x29 = this["$editor"]["get"](0);
                var _0x9e20x27;
                _0x9e20x29["focus"]();
                if (!_0x9e20x29["document"]["selection"]) {
                    return false;
                };
                _0x9e20x27 = _0x9e20x29["document"]["selection"]["createRange"]();
                return _0x9e20x27 && _0x9e20x27["parentElement"]()["document"] === _0x9e20x29["document"];
            };
        },
        getOrigin: function () {
            if (!this["oldIE"]()) {
                var _0x9e20x26;
                if (!((_0x9e20x26 = this["getSelection"]()) && (_0x9e20x26["anchorNode"] != null))) {
                    return null;
                };
                return [_0x9e20x26["anchorNode"], _0x9e20x26["anchorOffset"]];
            } else {
                var _0x9e20x29 = this["$editor"]["get"](0);
                var _0x9e20x27;
                _0x9e20x29["focus"]();
                if (!this["hasSelection"]()) {
                    return null;
                };
                _0x9e20x27 = _0x9e20x29["document"]["selection"]["createRange"]();
                return this._getBoundary(_0x9e20x29["document"], _0x9e20x27, true);
            };
        },
        getFocus: function () {
            if (!this["oldIE"]()) {
                var _0x9e20x26;
                if (!((_0x9e20x26 = this["getSelection"]()) && (_0x9e20x26["focusNode"] != null))) {
                    return null;
                };
                return [_0x9e20x26["focusNode"], _0x9e20x26["focusOffset"]];
            } else {
                var _0x9e20x29 = this["$editor"]["get"](0);
                var _0x9e20x27;
                _0x9e20x29["focus"]();
                if (!this["hasSelection"]()) {
                    return null;
                };
                _0x9e20x27 = _0x9e20x29["document"]["selection"]["createRange"]();
                return this._getBoundary(_0x9e20x29["document"], _0x9e20x27, false);
            };
        },
        setSelection: function (_0x9e20x67, _0x9e20x68, _0x9e20x69, _0x9e20x6a) {
            if (_0x9e20x69 == null) {
                _0x9e20x69 = _0x9e20x67;
            };
            if (_0x9e20x6a == null) {
                _0x9e20x6a = _0x9e20x68;
            };
            if (!this["oldIE"]()) {
                var _0x9e20x26 = this["getSelection"]();
                if (!_0x9e20x26) {
                    return;
                };
                if (_0x9e20x26["collapse"] && _0x9e20x26["extend"]) {
                    _0x9e20x26["collapse"](_0x9e20x67, _0x9e20x68);
                    _0x9e20x26["extend"](_0x9e20x69, _0x9e20x6a);
                } else {
                    r = this["document"]["createRange"]();
                    r["setStart"](_0x9e20x67, _0x9e20x68);
                    r["setEnd"](_0x9e20x69, _0x9e20x6a);
                    try {
                        _0x9e20x26["removeAllRanges"]();
                    } catch (e) {};
                    _0x9e20x26["addRange"](r);
                };
            } else {
                var _0x9e20x29 = this["$editor"]["get"](0);
                var _0x9e20x27 = _0x9e20x29["document"]["body"]["createTextRange"]();
                this._moveBoundary(_0x9e20x29["document"], _0x9e20x27, false, _0x9e20x69, _0x9e20x6a);
                this._moveBoundary(_0x9e20x29["document"], _0x9e20x27, true, _0x9e20x67, _0x9e20x68);
                return _0x9e20x27["select"]();
            };
        },
        getCurrentNode: function () {
            if (typeof this["window"]["getSelection"] !== "undefined") {
                return this["getSelectedNode"]()["parentNode"];
            } else {
                if (typeof this["document"]["selection"] !== "undefined") {
                    return this["getSelection"]()["parentElement"]();
                };
            };
        },
        getParentNode: function () {
            return _0x9e20x4(this["getCurrentNode"]())["parent"]()[0];
        },
        getSelectedNode: function () {
            if (this["oldIE"]()) {
                return this["getSelection"]()["parentElement"]();
            } else {
                if (typeof this["window"]["getSelection"] !== "undefined") {
                    var _0x9e20xe = this["window"]["getSelection"]();
                    if (_0x9e20xe["rangeCount"] > 0) {
                        return this["getSelection"]()["getRangeAt"](0)["commonAncestorContainer"];
                    } else {
                        return false;
                    };
                } else {
                    if (typeof this["document"]["selection"] !== "undefined") {
                        return this["getSelection"]();
                    };
                };
            };
        },
        _getBoundary: function (_0x9e20x66, _0x9e20x6b, _0x9e20x6c) {
            var _0x9e20x6d, _0x9e20x6e, _0x9e20x29, _0x9e20x6f, _0x9e20x19;
            _0x9e20x6e = _0x9e20x66["createElement"]("a");
            _0x9e20x6d = _0x9e20x6b["duplicate"]();
            _0x9e20x6d["collapse"](_0x9e20x6c);
            _0x9e20x19 = _0x9e20x6d["parentElement"]();
            while (true) {
                _0x9e20x19["insertBefore"](_0x9e20x6e, _0x9e20x6e["previousSibling"]);
                _0x9e20x6d["moveToElementText"](_0x9e20x6e);
                if (!(_0x9e20x6d["compareEndPoints"]((_0x9e20x6c ? "StartToStart" : "StartToEnd"), _0x9e20x6b) > 0 && (_0x9e20x6e["previousSibling"] != null))) {
                    break;
                };
            };
            if (_0x9e20x6d["compareEndPoints"]((_0x9e20x6c ? "StartToStart" : "StartToEnd"), _0x9e20x6b) === -1 && _0x9e20x6e["nextSibling"]) {
                _0x9e20x6d["setEndPoint"]((_0x9e20x6c ? "EndToStart" : "EndToEnd"), _0x9e20x6b);
                _0x9e20x29 = _0x9e20x6e["nextSibling"];
                _0x9e20x6f = _0x9e20x6d["text"]["length"];
            } else {
                _0x9e20x29 = _0x9e20x6e["parentNode"];
                _0x9e20x6f = this._getChildIndex(_0x9e20x6e);
            };
            _0x9e20x6e["parentNode"]["removeChild"](_0x9e20x6e);
            return [_0x9e20x29, _0x9e20x6f];
        },
        _moveBoundary: function (_0x9e20x66, _0x9e20x6b, _0x9e20x6c, _0x9e20x29, _0x9e20x6f) {
            var _0x9e20x70, _0x9e20x71, _0x9e20x6d, _0x9e20x6e, _0x9e20x72;
            _0x9e20x72 = 0;
            _0x9e20x70 = this._isText(_0x9e20x29) ? _0x9e20x29 : _0x9e20x29["childNodes"][_0x9e20x6f];
            _0x9e20x71 = this._isText(_0x9e20x29) ? _0x9e20x29["parentNode"] : _0x9e20x29;
            if (this._isText(_0x9e20x29)) {
                _0x9e20x72 = _0x9e20x6f;
            };
            _0x9e20x6e = _0x9e20x66["createElement"]("a");
            _0x9e20x71["insertBefore"](_0x9e20x6e, _0x9e20x70 || null);
            _0x9e20x6d = _0x9e20x66["body"]["createTextRange"]();
            _0x9e20x6d["moveToElementText"](_0x9e20x6e);
            _0x9e20x6e["parentNode"]["removeChild"](_0x9e20x6e);
            _0x9e20x6b["setEndPoint"]((_0x9e20x6c ? "StartToStart" : "EndToEnd"), _0x9e20x6d);
            return _0x9e20x6b[_0x9e20x6c ? "moveStart" : "moveEnd"]("character", _0x9e20x72);
        },
        _isText: function (_0x9e20x50) {
            return (_0x9e20x50 != null ? _0x9e20x50["nodeType"] == 3 : false);
        },
        _getChildIndex: function (_0x9e20x13) {
            var _0x9e20x73 = 0;
            while (_0x9e20x13 = _0x9e20x13["previousSibling"]) {
                _0x9e20x73++;
            };
            return _0x9e20x73;
        },
        insertNodeAfterCaret: function (_0x9e20x29) {
            this["saveSelection"]();
            this["insertNodeAtCaret"](_0x9e20x29);
            this["restoreSelection"]();
        },
        insertNodeAtCaret: function (_0x9e20x29) {
            if (this["window"]["getSelection"]) {
                var _0x9e20x26 = this["getSelection"]();
                if (_0x9e20x26["rangeCount"]) {
                    var _0x9e20x27 = _0x9e20x26["getRangeAt"](0);
                    _0x9e20x27["collapse"](false);
                    _0x9e20x27["insertNode"](_0x9e20x29);
                    _0x9e20x27 = _0x9e20x27["cloneRange"]();
                    _0x9e20x27["selectNodeContents"](_0x9e20x29);
                    _0x9e20x27["collapse"](false);
                    _0x9e20x26["removeAllRanges"]();
                    _0x9e20x26["addRange"](_0x9e20x27);
                };
            } else {
                if (this["document"]["selection"]) {
                    var _0x9e20x16 = (_0x9e20x29["nodeType"] === 1) ? _0x9e20x29["outerHTML"] : _0x9e20x29["data"];
                    var _0x9e20x74 = "marker_" + ("" + Math["random"]())["slice"](2);
                    _0x9e20x16 += "<span id=\"" + _0x9e20x74 + "\"></span>";
                    var _0x9e20x6b = this["getSelection"]();
                    _0x9e20x6b["collapse"](false);
                    _0x9e20x6b["pasteHTML"](_0x9e20x16);
                    var _0x9e20x75 = this["document"]["getElementById"](_0x9e20x74);
                    _0x9e20x6b["moveToElementText"](_0x9e20x75);
                    _0x9e20x6b["select"]();
                    _0x9e20x75["parentNode"]["removeChild"](_0x9e20x75);
                };
            };
        },
        getSelectedHtml: function () {
            var _0x9e20x16 = "";
            if (this["window"]["getSelection"]) {
                var _0x9e20x26 = this["window"]["getSelection"]();
                if (_0x9e20x26["rangeCount"]) {
                    var _0x9e20x76 = this["document"]["createElement"]("div");
                    for (var _0x9e20xd = 0, _0x9e20x53 = _0x9e20x26["rangeCount"]; _0x9e20xd < _0x9e20x53; ++_0x9e20xd) {
                        _0x9e20x76["appendChild"](_0x9e20x26["getRangeAt"](_0x9e20xd)["cloneContents"]());
                    };
                    _0x9e20x16 = _0x9e20x76["innerHTML"];
                };
            } else {
                if (this["document"]["selection"]) {
                    if (this["document"]["selection"]["type"] === "Text") {
                        _0x9e20x16 = this["document"]["selection"]["createRange"]()["htmlText"];
                    };
                };
            };
            return _0x9e20x16;
        },
        resizeImage: function (_0x9e20x77) {
            var _0x9e20x78 = false;
            var _0x9e20x79 = false;
            var _0x9e20x7a;
            var _0x9e20x7b;
            var _0x9e20x7c = _0x9e20x4(_0x9e20x77)["width"]() / _0x9e20x4(_0x9e20x77)["height"]();
            var _0x9e20x7d = 10;
            var _0x9e20x7e = 10;
            _0x9e20x4(_0x9e20x77)["off"]("hover mousedown mouseup click mousemove");
            _0x9e20x4(_0x9e20x77)["hover"](function () {
                _0x9e20x4(_0x9e20x77)["css"]("cursor", "nw-resize");
            }, function () {
                _0x9e20x4(_0x9e20x77)["css"]("cursor", "");
                _0x9e20x78 = false;
            });
            _0x9e20x4(_0x9e20x77)["mousedown"](function (_0x9e20x13) {
                _0x9e20x13["preventDefault"]();
                _0x9e20x7c = _0x9e20x4(_0x9e20x77)["width"]() / _0x9e20x4(_0x9e20x77)["height"]();
                _0x9e20x78 = true;
                _0x9e20x79 = true;
                _0x9e20x7a = Math["round"](_0x9e20x13["pageX"] - _0x9e20x4(_0x9e20x77)["eq"](0)["offset"]()["left"]);
                _0x9e20x7b = Math["round"](_0x9e20x13["pageY"] - _0x9e20x4(_0x9e20x77)["eq"](0)["offset"]()["top"]);
            });
            _0x9e20x4(_0x9e20x77)["mouseup"](_0x9e20x4["proxy"](function (_0x9e20x13) {
                _0x9e20x78 = false;
                _0x9e20x4(_0x9e20x77)["css"]("cursor", "");
                this["syncCode"]();
            }, this));
            _0x9e20x4(_0x9e20x77)["click"](_0x9e20x4["proxy"](function (_0x9e20x13) {
                if (_0x9e20x79) {
                    this["imageEdit"](_0x9e20x13);
                };
            }, this));
            _0x9e20x4(_0x9e20x77)["mousemove"](function (_0x9e20x13) {
                if (_0x9e20x78) {
                    _0x9e20x79 = false;
                    var _0x9e20x7f = Math["round"](_0x9e20x13["pageX"] - _0x9e20x4(this)["eq"](0)["offset"]()["left"]) - _0x9e20x7a;
                    var _0x9e20x80 = Math["round"](_0x9e20x13["pageY"] - _0x9e20x4(this)["eq"](0)["offset"]()["top"]) - _0x9e20x7b;
                    var _0x9e20x81 = _0x9e20x4(_0x9e20x77)["height"]();
                    var _0x9e20x82 = parseInt(_0x9e20x81, 10) + _0x9e20x80;
                    var _0x9e20x83 = _0x9e20x82 * _0x9e20x7c;
                    if (_0x9e20x83 > _0x9e20x7d) {
                        _0x9e20x4(_0x9e20x77)["width"](_0x9e20x83);
                    };
                    if (_0x9e20x82 > _0x9e20x7e) {
                        _0x9e20x4(_0x9e20x77)["height"](_0x9e20x82);
                    };
                    _0x9e20x7a = Math["round"](_0x9e20x13["pageX"] - _0x9e20x4(this)["eq"](0)["offset"]()["left"]);
                    _0x9e20x7b = Math["round"](_0x9e20x13["pageY"] - _0x9e20x4(this)["eq"](0)["offset"]()["top"]);
                };
            });
        },
        showTable: function () {
            this["saveSelection"]();
            this["modalInit"](RLANG["table"], this["opts"]["modal_table"], 300, _0x9e20x4["proxy"](function () {
                _0x9e20x4("#redactor_insert_table_btn")["click"](_0x9e20x4["proxy"](this["insertTable"], this));
                setTimeout(function () {
                    _0x9e20x4("#redactor_table_rows")["focus"]();
                }, 200);
            }, this));
        },
        insertTable: function () {
            var _0x9e20x84 = _0x9e20x4("#redactor_table_rows")["val"]();
            var _0x9e20x85 = _0x9e20x4("#redactor_table_columns")["val"]();
            var _0x9e20x86 = _0x9e20x4("<div></div>");
            var _0x9e20x87 = Math["floor"](Math["random"]() * 99999);
            var _0x9e20x88 = _0x9e20x4("<table id=\"table" + _0x9e20x87 + "\"><tbody></tbody></table>");
            for (var _0x9e20xd = 0; _0x9e20xd < _0x9e20x84; _0x9e20xd++) {
                var _0x9e20x89 = _0x9e20x4("<tr></tr>");
                for (var _0x9e20x8a = 0; _0x9e20x8a < _0x9e20x85; _0x9e20x8a++) {
                    var _0x9e20x8b = _0x9e20x4("<td><br></td>");
                    _0x9e20x4(_0x9e20x89)["append"](_0x9e20x8b);
                };
                _0x9e20x4(_0x9e20x88)["append"](_0x9e20x89);
            };
            _0x9e20x4(_0x9e20x86)["append"](_0x9e20x88);
            var _0x9e20x16 = _0x9e20x4(_0x9e20x86)["html"]() + "<p></p>";
            this["restoreSelection"]();
            this["execCommand"]("inserthtml", _0x9e20x16);
            this["modalClose"]();
            this["observeTables"]();
        },
        tableObserver: function (_0x9e20x13) {
            this["$table"] = _0x9e20x4(_0x9e20x13["target"])["closest"]("table");
            this["$table_tr"] = this["$table"]["find"]("tr");
            this["$table_td"] = this["$table"]["find"]("td");
            this["$tbody"] = _0x9e20x4(_0x9e20x13["target"])["closest"]("tbody");
            this["$thead"] = _0x9e20x4(this.$table)["find"]("thead");
            this["$current_td"] = _0x9e20x4(_0x9e20x13["target"]);
            this["$current_tr"] = _0x9e20x4(_0x9e20x13["target"])["closest"]("tr");
        },
        deleteTable: function () {
            _0x9e20x4(this.$table)["remove"]();
            this["$table"] = false;
            this["syncCode"]();
        },
        deleteRow: function () {
            _0x9e20x4(this.$current_tr)["remove"]();
            this["syncCode"]();
        },
        deleteColumn: function () {
            var _0x9e20xb = _0x9e20x4(this.$current_td)["get"](0)["cellIndex"];
            _0x9e20x4(this.$table)["find"]("tr")["each"](function () {
                _0x9e20x4(this)["find"]("td")["eq"](_0x9e20xb)["remove"]();
            });
            this["syncCode"]();
        },
        addHead: function () {
            if (_0x9e20x4(this.$table)["find"]("thead")["size"]() !== 0) {
                this["deleteHead"]();
            } else {
                var _0x9e20x8c = _0x9e20x4(this.$table)["find"]("tr")["first"]()["clone"]();
                _0x9e20x8c["find"]("td")["html"]("&nbsp;");
                this["$thead"] = _0x9e20x4("<thead></thead>");
                this["$thead"]["append"](_0x9e20x8c);
                _0x9e20x4(this.$table)["prepend"](this.$thead);
                this["syncCode"]();
            };
        },
        deleteHead: function () {
            _0x9e20x4(this.$thead)["remove"]();
            this["$thead"] = false;
            this["syncCode"]();
        },
        insertRowAbove: function () {
            this["insertRow"]("before");
        },
        insertRowBelow: function () {
            this["insertRow"]("after");
        },
        insertColumnLeft: function () {
            this["insertColumn"]("before");
        },
        insertColumnRight: function () {
            this["insertColumn"]("after");
        },
        insertRow: function (_0x9e20x8d) {
            var _0x9e20x8e = _0x9e20x4(this.$current_tr)["clone"]();
            _0x9e20x8e["find"]("td")["html"]("&nbsp;");
            if (_0x9e20x8d === "after") {
                _0x9e20x4(this.$current_tr)["after"](_0x9e20x8e);
            } else {
                _0x9e20x4(this.$current_tr)["before"](_0x9e20x8e);
            };
            this["syncCode"]();
        },
        insertColumn: function (_0x9e20x8d) {
            var _0x9e20xb = 0;
            this["$current_tr"]["find"]("td")["each"](_0x9e20x4["proxy"](function (_0x9e20xd, _0x9e20xe) {
                if (_0x9e20x4(_0x9e20xe)[0] === this["$current_td"][0]) {
                    _0x9e20xb = _0x9e20xd;
                };
            }, this));
            this["$table_tr"]["each"](function (_0x9e20xd, _0x9e20xe) {
                var _0x9e20x1a = _0x9e20x4(_0x9e20xe)["find"]("td")["eq"](_0x9e20xb);
                var _0x9e20x8f = _0x9e20x1a["clone"]();
                _0x9e20x8f["html"]("&nbsp;");
                if (_0x9e20x8d === "after") {
                    _0x9e20x4(_0x9e20x1a)["after"](_0x9e20x8f);
                } else {
                    _0x9e20x4(_0x9e20x1a)["before"](_0x9e20x8f);
                };
            });
            this["syncCode"]();
        },
        showVideo: function () {
            this["saveSelection"]();
            this["modalInit"](RLANG["video"], this["opts"]["modal_video"], 600, _0x9e20x4["proxy"](function () {
                _0x9e20x4("#redactor_insert_video_btn")["click"](_0x9e20x4["proxy"](this["insertVideo"], this));
                setTimeout(function () {
                    _0x9e20x4("#redactor_insert_video_area")["focus"]();
                }, 200);
            }, this));
        },
        insertVideo: function () {
            var _0x9e20x7 = _0x9e20x4("#redactor_insert_video_area")["val"]();
            _0x9e20x7 = this["stripTags"](_0x9e20x7);
            this["restoreSelection"]();
            this["execCommand"]("inserthtml", _0x9e20x7);
            this["modalClose"]();
        },
        imageEdit: function (_0x9e20x13) {
            var _0x9e20x90 = _0x9e20x4(_0x9e20x13["target"]);
            var _0x9e20x19 = _0x9e20x90["parent"]();
            var _0x9e20x5d = _0x9e20x4["proxy"](function () {
                _0x9e20x4("#redactor_file_alt")["val"](_0x9e20x90["attr"]("alt"));
                _0x9e20x4("#redactor_image_edit_src")["attr"]("href", _0x9e20x90["attr"]("src"));
                _0x9e20x4("#redactor_form_image_align")["val"](_0x9e20x90["css"]("float"));
                if (_0x9e20x4(_0x9e20x19)["get"](0)["tagName"] === "A") {
                    _0x9e20x4("#redactor_file_link")["val"](_0x9e20x4(_0x9e20x19)["attr"]("href"));
                };
                _0x9e20x4("#redactor_image_delete_btn")["click"](_0x9e20x4["proxy"](function () {
                    this["imageDelete"](_0x9e20x90);
                }, this));
                _0x9e20x4("#redactorSaveBtn")["click"](_0x9e20x4["proxy"](function () {
                    this["imageSave"](_0x9e20x90);
                }, this));
            }, this);
            this["modalInit"](RLANG["image"], this["opts"]["modal_image_edit"], 380, _0x9e20x5d);
        },
        imageDelete: function (_0x9e20x28) {
            var _0x9e20x19 = _0x9e20x4(_0x9e20x28)["parent"]();
            if (_0x9e20x19["size"]() != 0 && _0x9e20x19[0]["tagName"] == "A") {
                _0x9e20x19["remove"]();
            } else {
                _0x9e20x4(_0x9e20x28)["remove"]();
            };
            this["modalClose"]();
            this["syncCode"]();
        },
        imageSave: function (_0x9e20x28) {
            var _0x9e20x19 = _0x9e20x4(_0x9e20x28)["parent"]();
            _0x9e20x4(_0x9e20x28)["attr"]("alt", _0x9e20x4("#redactor_file_alt")["val"]());
            var _0x9e20x91 = _0x9e20x4("#redactor_form_image_align")["val"]();
            if (_0x9e20x91 === "left") {
                _0x9e20x4(_0x9e20x28)["css"]({
                    "float": "left",
                    margin: "0 10px 10px 0"
                });
            } else {
                if (_0x9e20x91 === "right") {
                    _0x9e20x4(_0x9e20x28)["css"]({
                        "float": "right",
                        margin: "0 0 10px 10px"
                    });
                } else {
                    _0x9e20x4(_0x9e20x28)["css"]({
                        "float": "none",
                        margin: "0"
                    });
                };
            };
            var _0x9e20x92 = _0x9e20x4["trim"](_0x9e20x4("#redactor_file_link")["val"]());
            if (_0x9e20x92 !== "") {
                if (_0x9e20x4(_0x9e20x19)["get"](0)["tagName"] !== "A") {
                    _0x9e20x4(_0x9e20x28)["replaceWith"]("<a href=\"" + _0x9e20x92 + "\">" + this["outerHTML"](_0x9e20x28) + "</a>");
                } else {
                    _0x9e20x4(_0x9e20x19)["attr"]("href", _0x9e20x92);
                };
            } else {
                if (_0x9e20x4(_0x9e20x19)["get"](0)["tagName"] === "A") {
                    _0x9e20x4(_0x9e20x19)["replaceWith"](this["outerHTML"](_0x9e20x28));
                };
            };
            this["modalClose"]();
            this["observeImages"]();
            this["syncCode"]();
        },
        showImage: function () {
            this["saveSelection"]();
            var _0x9e20x5d = _0x9e20x4["proxy"](function () {
                if (this["opts"]["imageGetJson"] !== false) {
                    _0x9e20x4["getJSON"](this["opts"]["imageGetJson"], _0x9e20x4["proxy"](function (_0x9e20x7) {
                        var _0x9e20x93 = {};
                        var _0x9e20x8a = 0;
                        _0x9e20x4["each"](_0x9e20x7, _0x9e20x4["proxy"](function (_0x9e20x18, _0x9e20x94) {
                            if (typeof _0x9e20x94["folder"] !== "undefined") {
                                _0x9e20x8a++;
                                _0x9e20x93[_0x9e20x94["folder"]] = _0x9e20x8a;
                            };
                        }, this));
                        var _0x9e20x95 = false;
                        _0x9e20x4["each"](_0x9e20x7, _0x9e20x4["proxy"](function (_0x9e20x18, _0x9e20x94) {
                            var _0x9e20x96 = "";
                            if (typeof _0x9e20x94["title"] !== "undefined") {
                                _0x9e20x96 = _0x9e20x94["title"];
                            };
                            var _0x9e20x97 = 0;
                            if (!_0x9e20x4["isEmptyObject"](_0x9e20x93) && typeof _0x9e20x94["folder"] !== "undefined") {
                                _0x9e20x97 = _0x9e20x93[_0x9e20x94["folder"]];
                                if (_0x9e20x95 === false) {
                                    _0x9e20x95 = ".redactorfolder" + _0x9e20x97;
                                };
                            };
                            var _0x9e20x98 = _0x9e20x4("<img src=\"" + _0x9e20x94["thumb"] + "\" class=\"redactorfolder redactorfolder" + _0x9e20x97 + "\" rel=\"" + _0x9e20x94["image"] + "\" title=\"" + _0x9e20x96 + "\" />");
                            _0x9e20x4("#redactor_image_box")["append"](_0x9e20x98);
                            _0x9e20x4(_0x9e20x98)["click"](_0x9e20x4["proxy"](this["imageSetThumb"], this));
                        }, this));
                        if (!_0x9e20x4["isEmptyObject"](_0x9e20x93)) {
                            _0x9e20x4(".redactorfolder")["hide"]();
                            _0x9e20x4(_0x9e20x95)["show"]();
                            var _0x9e20x99 = function (_0x9e20x13) {
                                _0x9e20x4(".redactorfolder")["hide"]();
                                _0x9e20x4(".redactorfolder" + _0x9e20x4(_0x9e20x13["target"])["val"]())["show"]();
                            };
                            var _0x9e20x9a = _0x9e20x4("<select id=\"redactor_image_box_select\">");
                            _0x9e20x4["each"](_0x9e20x93, function (_0x9e20x73, _0x9e20x9b) {
                                _0x9e20x9a["append"](_0x9e20x4("<option value=\"" + _0x9e20x9b + "\">" + _0x9e20x73 + "</option>"));
                            });
                            _0x9e20x4("#redactor_image_box")["before"](_0x9e20x9a);
                            _0x9e20x9a["change"](_0x9e20x99);
                        };
                    }, this));
                } else {
                    _0x9e20x4("#redactor_tabs a")["eq"](1)["remove"]();
                }; if (this["opts"]["imageUpload"] !== false) {
                    if (this["opts"]["uploadCrossDomain"] === false && this["isMobile"]() === false) {
                        if (_0x9e20x4("#redactor_file")["size"]() !== 0) {
                            _0x9e20x4("#redactor_file")["dragupload"]({
                                url: this["opts"]["imageUpload"],
                                uploadFields: this["opts"]["uploadFields"],
                                success: _0x9e20x4["proxy"](this["imageUploadCallback"], this),
                                error: _0x9e20x4["proxy"](this["opts"]["imageUploadErrorCallback"], this)
                            });
                        };
                    };
                    this["uploadInit"]("redactor_file", {
                        auto: true,
                        url: this["opts"]["imageUpload"],
                        success: _0x9e20x4["proxy"](this["imageUploadCallback"], this),
                        error: _0x9e20x4["proxy"](this["opts"]["imageUploadErrorCallback"], this)
                    });
                } else {
                    _0x9e20x4(".redactor_tab")["hide"]();
                    if (this["opts"]["imageGetJson"] === false) {
                        _0x9e20x4("#redactor_tabs")["remove"]();
                        _0x9e20x4("#redactor_tab3")["show"]();
                    } else {
                        var _0x9e20x9c = _0x9e20x4("#redactor_tabs a");
                        _0x9e20x9c["eq"](0)["remove"]();
                        _0x9e20x9c["eq"](1)["addClass"]("redactor_tabs_act");
                        _0x9e20x4("#redactor_tab2")["show"]();
                    };
                };
                _0x9e20x4("#redactor_upload_btn")["click"](_0x9e20x4["proxy"](this["imageUploadCallbackLink"], this));
                if (this["opts"]["imageUpload"] === false && this["opts"]["imageGetJson"] === false) {
                    setTimeout(function () {
                        _0x9e20x4("#redactor_file_link")["focus"]();
                    }, 200);
                };
            }, this);
            this["modalInit"](RLANG["image"], this["opts"]["modal_image"], 610, _0x9e20x5d);
        },
        imageSetThumb: function (_0x9e20x13) {
            this._imageSet("<img src=\"" + _0x9e20x4(_0x9e20x13["target"])["attr"]("rel") + "\" alt=\"" + _0x9e20x4(_0x9e20x13["target"])["attr"]("title") + "\" />", true);
        },
        imageUploadCallbackLink: function () {
            if (_0x9e20x4("#redactor_file_link")["val"]() !== "") {
                var _0x9e20x7 = "<img src=\"" + _0x9e20x4("#redactor_file_link")["val"]() + "\" />";
                this._imageSet(_0x9e20x7, true);
            } else {
                this["modalClose"]();
            };
        },
        imageUploadCallback: function (_0x9e20x7) {
            this._imageSet(_0x9e20x7);
        },
        _imageSet: function (_0x9e20x9d, _0x9e20x92) {
            this["restoreSelection"]();
            if (_0x9e20x9d !== false) {
                var _0x9e20x16 = "";
                if (_0x9e20x92 !== true) {
                    _0x9e20x16 = "<p><img src=\"" + _0x9e20x9d["filelink"] + "\" /></p>";
                } else {
                    _0x9e20x16 = _0x9e20x9d;
                };
                this["execCommand"]("inserthtml", _0x9e20x16);
                if (_0x9e20x92 !== true && typeof this["opts"]["imageUploadCallback"] === "function") {
                    this["opts"]["imageUploadCallback"](this, _0x9e20x9d);
                };
            };
            this["modalClose"]();
            this["observeImages"]();
        },
        showLink: function () {
            this["saveSelection"]();
            var _0x9e20x5d = _0x9e20x4["proxy"](function () {
                this["insert_link_node"] = false;
                var _0x9e20x26 = this["getSelection"]();
                var _0x9e20x9e = "",
                    _0x9e20x9f = "",
                    _0x9e20xa0 = "";
                if (this["browser"]("msie")) {
                    var _0x9e20x19 = this["getParentNode"]();
                    if (_0x9e20x19["nodeName"] === "A") {
                        this["insert_link_node"] = _0x9e20x4(_0x9e20x19);
                        _0x9e20x9f = this["insert_link_node"]["text"]();
                        _0x9e20x9e = this["insert_link_node"]["attr"]("href");
                        _0x9e20xa0 = this["insert_link_node"]["attr"]("target");
                    } else {
                        if (this["oldIE"]()) {
                            _0x9e20x9f = _0x9e20x26["text"];
                        } else {
                            _0x9e20x9f = _0x9e20x26.toString();
                        };
                    };
                } else {
                    if (_0x9e20x26 && _0x9e20x26["anchorNode"] && _0x9e20x26["anchorNode"]["parentNode"]["tagName"] === "A") {
                        _0x9e20x9e = _0x9e20x26["anchorNode"]["parentNode"]["href"];
                        _0x9e20x9f = _0x9e20x26["anchorNode"]["parentNode"]["text"];
                        _0x9e20xa0 = _0x9e20x26["anchorNode"]["parentNode"]["target"];
                        if (_0x9e20x26.toString() === "") {
                            this["insert_link_node"] = _0x9e20x26["anchorNode"]["parentNode"];
                        };
                    } else {
                        _0x9e20x9f = _0x9e20x26.toString();
                    };
                };
                _0x9e20x4(".redactor_link_text")["val"](_0x9e20x9f);
                var _0x9e20xa1 = self["location"]["href"]["replace"](/\/$/i, "");
                var _0x9e20xa2 = _0x9e20x9e["replace"](_0x9e20xa1, "");
                if (_0x9e20x9e["search"]("mailto:") === 0) {
                    this["setModalTab"](2);
                    _0x9e20x4("#redactor_tab_selected")["val"](2);
                    _0x9e20x4("#redactor_link_mailto")["val"](_0x9e20x9e["replace"]("mailto:", ""));
                } else {
                    if (_0x9e20xa2["search"](/^#/gi) === 0) {
                        this["setModalTab"](3);
                        _0x9e20x4("#redactor_tab_selected")["val"](3);
                        _0x9e20x4("#redactor_link_anchor")["val"](_0x9e20xa2["replace"](/^#/gi, ""));
                    } else {
                        _0x9e20x4("#redactor_link_url")["val"](_0x9e20xa2);
                    };
                }; if (_0x9e20xa0 === "_blank") {
                    _0x9e20x4("#redactor_link_blank")["attr"]("checked", true);
                };
                _0x9e20x4("#redactor_insert_link_btn")["click"](_0x9e20x4["proxy"](this["insertLink"], this));
                setTimeout(function () {
                    _0x9e20x4("#redactor_link_url")["focus"]();
                }, 200);
            }, this);
            this["modalInit"](RLANG["link"], this["opts"]["modal_link"], 460, _0x9e20x5d);
        },
        insertLink: function () {
            var _0x9e20xa3 = _0x9e20x4("#redactor_tab_selected")["val"]();
            var _0x9e20x92 = "",
                _0x9e20x9f = "",
                _0x9e20xa4 = "",
                _0x9e20xa0 = "";
            if (_0x9e20xa3 === "1") {
                _0x9e20x92 = _0x9e20x4("#redactor_link_url")["val"]();
                _0x9e20x9f = _0x9e20x4("#redactor_link_url_text")["val"]();
                if (_0x9e20x4("#redactor_link_blank")["prop"]("checked")) {
                    _0x9e20xa4 = " target=\"_blank\"";
                    _0x9e20xa0 = "_blank";
                };
                var _0x9e20xa5 = "/(w+:{0,1}w*@)?(S+)(:[0-9]+)?(/|/([w#!:.?+=&%@!-/]))?/";
                var _0x9e20xa6 = new RegExp("^(http|ftp|https)://" + _0x9e20xa5, "i");
                var _0x9e20xa7 = new RegExp("^" + _0x9e20xa5, "i");
                if (_0x9e20x92["search"](_0x9e20xa6) == -1 && _0x9e20x92["search"](_0x9e20xa7) == 0 && this["opts"]["protocol"] !== false) {
                    _0x9e20x92 = this["opts"]["protocol"] + _0x9e20x92;
                };
            } else {
                if (_0x9e20xa3 === "2") {
                    _0x9e20x92 = "mailto:" + _0x9e20x4("#redactor_link_mailto")["val"]();
                    _0x9e20x9f = _0x9e20x4("#redactor_link_mailto_text")["val"]();
                } else {
                    if (_0x9e20xa3 === "3") {
                        _0x9e20x92 = "#" + _0x9e20x4("#redactor_link_anchor")["val"]();
                        _0x9e20x9f = _0x9e20x4("#redactor_link_anchor_text")["val"]();
                    };
                };
            };
            this._insertLink("<a href=\"" + _0x9e20x92 + "\"" + _0x9e20xa4 + ">" + _0x9e20x9f + "</a>", _0x9e20x4["trim"](_0x9e20x9f), _0x9e20x92, _0x9e20xa0);
        },
        _insertLink: function (_0x9e20x37, _0x9e20x9f, _0x9e20x92, _0x9e20xa0) {
            this["$editor"]["focus"]();
            this["restoreSelection"]();
            if (_0x9e20x9f !== "") {
                if (this["insert_link_node"]) {
                    _0x9e20x4(this["insert_link_node"])["text"](_0x9e20x9f);
                    _0x9e20x4(this["insert_link_node"])["attr"]("href", _0x9e20x92);
                    if (_0x9e20xa0 !== "") {
                        _0x9e20x4(this["insert_link_node"])["attr"]("target", _0x9e20xa0);
                    } else {
                        _0x9e20x4(this["insert_link_node"])["removeAttr"]("target");
                    };
                    this["syncCode"]();
                } else {
                    this["execCommand"]("inserthtml", _0x9e20x37);
                };
            };
            this["modalClose"]();
        },
        showFile: function () {
            this["saveSelection"]();
            var _0x9e20x5d = _0x9e20x4["proxy"](function () {
                var _0x9e20x26 = this["getSelection"]();
                var _0x9e20x9f = "";
                if (this["oldIE"]()) {
                    _0x9e20x9f = _0x9e20x26["text"];
                } else {
                    _0x9e20x9f = _0x9e20x26.toString();
                };
                _0x9e20x4("#redactor_filename")["val"](_0x9e20x9f);
                if (this["opts"]["uploadCrossDomain"] === false && this["isMobile"]() === false) {
                    _0x9e20x4("#redactor_file")["dragupload"]({
                        url: this["opts"]["fileUpload"],
                        uploadFields: this["opts"]["uploadFields"],
                        success: _0x9e20x4["proxy"](this["fileUploadCallback"], this),
                        error: _0x9e20x4["proxy"](this["opts"]["fileUploadErrorCallback"], this)
                    });
                };
                this["uploadInit"]("redactor_file", {
                    auto: true,
                    url: this["opts"]["fileUpload"],
                    success: _0x9e20x4["proxy"](this["fileUploadCallback"], this),
                    error: _0x9e20x4["proxy"](this["opts"]["fileUploadErrorCallback"], this)
                });
            }, this);
            this["modalInit"](RLANG["file"], this["opts"]["modal_file"], 500, _0x9e20x5d);
        },
        fileUploadCallback: function (_0x9e20x9d) {
            this["restoreSelection"]();
            if (_0x9e20x9d !== false) {
                var _0x9e20x9f = _0x9e20x4("#redactor_filename")["val"]();
                if (_0x9e20x9f === "") {
                    _0x9e20x9f = _0x9e20x9d["filename"];
                };
                var _0x9e20x92 = "<a href=\"" + _0x9e20x9d["filelink"] + "\">" + _0x9e20x9f + "</a>";
                if (this["browser"]("webkit") && !! this["window"]["chrome"]) {
                    _0x9e20x92 = _0x9e20x92 + "&nbsp;";
                };
                this["execCommand"]("inserthtml", _0x9e20x92);
                if (typeof this["opts"]["fileUploadCallback"] === "function") {
                    this["opts"]["fileUploadCallback"](this, _0x9e20x9d);
                };
            };
            this["modalClose"]();
        },
        modalInit: function (_0x9e20x5c, _0x9e20xa8, _0x9e20x23, _0x9e20x5d) {
            if (_0x9e20x4("#redactor_modal_overlay")["size"]() === 0) {
                this["overlay"] = _0x9e20x4("<div id=\"redactor_modal_overlay\" style=\"display: none;\"></div>");
                _0x9e20x4("body")["prepend"](this["overlay"]);
            };
            if (this["opts"]["overlay"]) {
                _0x9e20x4("#redactor_modal_overlay")["show"]();
                _0x9e20x4("#redactor_modal_overlay")["click"](_0x9e20x4["proxy"](this["modalClose"], this));
            };
            if (_0x9e20x4("#redactor_modal")["size"]() === 0) {
                this["modal"] = _0x9e20x4("<div id=\"redactor_modal\" style=\"display: none;\"><div id=\"redactor_modal_close\">&times;</div><div id=\"redactor_modal_header\"></div><div id=\"redactor_modal_inner\"></div></div>");
                _0x9e20x4("body")["append"](this["modal"]);
            };
            _0x9e20x4("#redactor_modal_close")["click"](_0x9e20x4["proxy"](this["modalClose"], this));
            this["hdlModalClose"] = _0x9e20x4["proxy"](function (_0x9e20x13) {
                if (_0x9e20x13["keyCode"] === 27) {
                    this["modalClose"]();
                    return false;
                };
            }, this);
            _0x9e20x4(document)["keyup"](this["hdlModalClose"]);
            this["$editor"]["keyup"](this["hdlModalClose"]);
            if (_0x9e20xa8["indexOf"]("#") == 0) {
                _0x9e20x4("#redactor_modal_inner")["empty"]()["append"](_0x9e20x4(_0x9e20xa8)["html"]());
            } else {
                _0x9e20x4("#redactor_modal_inner")["empty"]()["append"](_0x9e20xa8);
            };
            _0x9e20x4("#redactor_modal_header")["html"](_0x9e20x5c);
            if (typeof _0x9e20x4["fn"]["draggable"] !== "undefined") {
                _0x9e20x4("#redactor_modal")["draggable"]({
                    handle: "#redactor_modal_header"
                });
                _0x9e20x4("#redactor_modal_header")["css"]("cursor", "move");
            };
            if (_0x9e20x4("#redactor_tabs")["size"]() !== 0) {
                var _0x9e20xa9 = this;
                _0x9e20x4("#redactor_tabs a")["each"](function (_0x9e20xd, _0x9e20xe) {
                    _0x9e20xd++;
                    _0x9e20x4(_0x9e20xe)["click"](function () {
                        _0x9e20x4("#redactor_tabs a")["removeClass"]("redactor_tabs_act");
                        _0x9e20x4(this)["addClass"]("redactor_tabs_act");
                        _0x9e20x4(".redactor_tab")["hide"]();
                        _0x9e20x4("#redactor_tab" + _0x9e20xd)["show"]();
                        _0x9e20x4("#redactor_tab_selected")["val"](_0x9e20xd);
                        if (_0x9e20xa9["isMobile"]() === false) {
                            var _0x9e20x4c = _0x9e20x4("#redactor_modal")["outerHeight"]();
                            _0x9e20x4("#redactor_modal")["css"]("margin-top", "-" + (_0x9e20x4c + 10) / 2 + "px");
                        };
                    });
                });
            };
            _0x9e20x4("#redactor_modal .redactor_btn_modal_close")["click"](_0x9e20x4["proxy"](this["modalClose"], this));
            if (this["isMobile"]() === false) {
                _0x9e20x4("#redactor_modal")["css"]({
                    position: "fixed",
                    top: "-2000px",
                    left: "50%",
                    width: _0x9e20x23 + "px",
                    marginLeft: "-" + (_0x9e20x23 + 60) / 2 + "px"
                })["show"]();
                this["modalSaveBodyOveflow"] = _0x9e20x4(document["body"])["css"]("overflow");
                _0x9e20x4(document["body"])["css"]("overflow", "hidden");
            } else {
                _0x9e20x4("#redactor_modal")["css"]({
                    position: "fixed",
                    width: "100%",
                    height: "100%",
                    top: "0",
                    left: "0",
                    margin: "0",
                    minHeight: "300px"
                })["show"]();
            }; if (typeof _0x9e20x5d === "function") {
                _0x9e20x5d();
            };
            if (this["isMobile"]() === false) {
                setTimeout(function () {
                    var _0x9e20x4c = _0x9e20x4("#redactor_modal")["outerHeight"]();
                    _0x9e20x4("#redactor_modal")["css"]({
                        top: "50%",
                        height: "auto",
                        minHeight: "auto",
                        marginTop: "-" + (_0x9e20x4c + 10) / 2 + "px"
                    });
                }, 20);
            };
        },
        modalClose: function () {
            _0x9e20x4("#redactor_modal_close")["unbind"]("click", this["modalClose"]);
            _0x9e20x4("#redactor_modal")["fadeOut"]("fast", _0x9e20x4["proxy"](function () {
                _0x9e20x4("#redactor_modal_inner")["html"]("");
                if (this["opts"]["overlay"]) {
                    _0x9e20x4("#redactor_modal_overlay")["hide"]();
                    _0x9e20x4("#redactor_modal_overlay")["unbind"]("click", this["modalClose"]);
                };
                _0x9e20x4(document)["unbind"]("keyup", this["hdlModalClose"]);
                this["$editor"]["unbind"]("keyup", this["hdlModalClose"]);
            }, this));
            if (this["isMobile"]() === false) {
                _0x9e20x4(document["body"])["css"]("overflow", this["modalSaveBodyOveflow"] ? this["modalSaveBodyOveflow"] : "visible");
            };
            return false;
        },
        setModalTab: function (_0x9e20xaa) {
            _0x9e20x4(".redactor_tab")["hide"]();
            var _0x9e20x9c = _0x9e20x4("#redactor_tabs a");
            _0x9e20x9c["removeClass"]("redactor_tabs_act");
            _0x9e20x9c["eq"](_0x9e20xaa - 1)["addClass"]("redactor_tabs_act");
            _0x9e20x4("#redactor_tab" + _0x9e20xaa)["show"]();
        },
        uploadInit: function (_0x9e20x9, _0x9e20xa) {
            this["uploadOptions"] = {
                url: false,
                success: false,
                error: false,
                start: false,
                trigger: false,
                auto: false,
                input: false
            };
            _0x9e20x4["extend"](this["uploadOptions"], _0x9e20xa);
            if (_0x9e20x4("#" + _0x9e20x9)["size"]() !== 0 && _0x9e20x4("#" + _0x9e20x9)["get"](0)["tagName"] === "INPUT") {
                this["uploadOptions"]["input"] = _0x9e20x4("#" + _0x9e20x9);
                this["element"] = _0x9e20x4(_0x9e20x4("#" + _0x9e20x9)["get"](0)["form"]);
            } else {
                this["element"] = _0x9e20x4("#" + _0x9e20x9);
            };
            this["element_action"] = this["element"]["attr"]("action");
            if (this["uploadOptions"]["auto"]) {
                _0x9e20x4(this["uploadOptions"]["input"])["change"](_0x9e20x4["proxy"](function () {
                    this["element"]["submit"](function (_0x9e20x13) {
                        return false;
                    });
                    this["uploadSubmit"]();
                }, this));
            } else {
                if (this["uploadOptions"]["trigger"]) {
                    _0x9e20x4("#" + this["uploadOptions"]["trigger"])["click"](_0x9e20x4["proxy"](this["uploadSubmit"], this));
                };
            };
        },
        uploadSubmit: function () {
            this["uploadForm"](this["element"], this["uploadFrame"]());
        },
        uploadFrame: function () {
            this["id"] = "f" + Math["floor"](Math["random"]() * 99999);
            var _0x9e20x50 = this["document"]["createElement"]("div");
            var _0x9e20xab = "<iframe style=\"display:none\" id=\"" + this["id"] + "\" name=\"" + this["id"] + "\"></iframe>";
            _0x9e20x50["innerHTML"] = _0x9e20xab;
            _0x9e20x4(_0x9e20x50)["appendTo"]("body");
            if (this["uploadOptions"]["start"]) {
                this["uploadOptions"]["start"]();
            };
            _0x9e20x4("#" + this["id"])["load"](_0x9e20x4["proxy"](this["uploadLoaded"], this));
            return this["id"];
        },
        uploadForm: function (_0x9e20xac, _0x9e20xad) {
            if (this["uploadOptions"]["input"]) {
                var _0x9e20xae = "redactorUploadForm" + this["id"];
                var _0x9e20xaf = "redactorUploadFile" + this["id"];
                this["form"] = _0x9e20x4("<form  action=\"" + this["uploadOptions"]["url"] + "\" method=\"POST\" target=\"" + _0x9e20xad + "\" name=\"" + _0x9e20xae + "\" id=\"" + _0x9e20xae + "\" enctype=\"multipart/form-data\"></form>");
                if (this["opts"]["uploadFields"] !== false && typeof this["opts"]["uploadFields"] === "object") {
                    _0x9e20x4["each"](this["opts"]["uploadFields"], _0x9e20x4["proxy"](function (_0x9e20x73, _0x9e20x9b) {
                        if (_0x9e20x9b.toString()["indexOf"]("#") === 0) {
                            _0x9e20x9b = _0x9e20x4(_0x9e20x9b)["val"]();
                        };
                        var _0x9e20xb0 = _0x9e20x4("<input/>", {
                            "type": "hidden",
                            "name": _0x9e20x73,
                            "value": _0x9e20x9b
                        });
                        _0x9e20x4(this["form"])["append"](_0x9e20xb0);
                    }, this));
                };
                var _0x9e20xb1 = this["uploadOptions"]["input"];
                var _0x9e20x32 = _0x9e20x4(_0x9e20xb1)["clone"]();
                _0x9e20x4(_0x9e20xb1)["attr"]("id", _0x9e20xaf);
                _0x9e20x4(_0x9e20xb1)["before"](_0x9e20x32);
                _0x9e20x4(_0x9e20xb1)["appendTo"](this["form"]);
                _0x9e20x4(this["form"])["css"]("position", "absolute");
                _0x9e20x4(this["form"])["css"]("top", "-2000px");
                _0x9e20x4(this["form"])["css"]("left", "-2000px");
                _0x9e20x4(this["form"])["appendTo"]("body");
                this["form"]["submit"]();
            } else {
                _0x9e20xac["attr"]("target", _0x9e20xad);
                _0x9e20xac["attr"]("method", "POST");
                _0x9e20xac["attr"]("enctype", "multipart/form-data");
                _0x9e20xac["attr"]("action", this["uploadOptions"]["url"]);
                this["element"]["submit"]();
            };
        },
        uploadLoaded: function () {
            var _0x9e20xd = _0x9e20x4("#" + this["id"])[0];
            var _0x9e20x50;
            if (_0x9e20xd["contentDocument"]) {
                _0x9e20x50 = _0x9e20xd["contentDocument"];
            } else {
                if (_0x9e20xd["contentWindow"]) {
                    _0x9e20x50 = _0x9e20xd["contentWindow"]["document"];
                } else {
                    _0x9e20x50 = window["frames"][this["id"]]["document"];
                };
            }; if (this["uploadOptions"]["success"]) {
                if (typeof _0x9e20x50 !== "undefined") {
                    var _0x9e20xb2 = _0x9e20x50["body"]["innerHTML"];
                    var _0x9e20xb3 = _0x9e20xb2["match"](/\{(.|\n)*\}/)[0];
                    var _0x9e20x9d = _0x9e20x4["parseJSON"](_0x9e20xb3);
                    if (typeof _0x9e20x9d["error"] == "undefined") {
                        this["uploadOptions"]["success"](_0x9e20x9d);
                    } else {
                        this["uploadOptions"]["error"](this, _0x9e20x9d);
                        this["modalClose"]();
                    };
                } else {
                    alert("Upload failed!");
                    this["modalClose"]();
                };
            };
            this["element"]["attr"]("action", this["element_action"]);
            this["element"]["attr"]("target", "");
        },
        browser: function (_0x9e20xb4) {
            var _0x9e20xb5 = navigator["userAgent"]["toLowerCase"]();
            var _0x9e20xb6 = /(chrome)[ \/]([\w.]+)/ ["exec"](_0x9e20xb5) || /(webkit)[ \/]([\w.]+)/ ["exec"](_0x9e20xb5) || /(opera)(?:.*version|)[ \/]([\w.]+)/ ["exec"](_0x9e20xb5) || /(msie) ([\w.]+)/ ["exec"](_0x9e20xb5) || _0x9e20xb5["indexOf"]("compatible") < 0 && /(mozilla)(?:.*? rv:([\w.]+)|)/ ["exec"](_0x9e20xb5) || [];
            if (_0x9e20xb4 == "version") {
                return _0x9e20xb6[2];
            };
            if (_0x9e20xb4 == "webkit") {
                return (_0x9e20xb6[1] == "chrome" || _0x9e20xb6[1] == "webkit");
            };
            return _0x9e20xb6[1] == _0x9e20xb4;
        },
        oldIE: function () {
            if (this["browser"]("msie") && parseInt(this["browser"]("version"), 10) < 9) {
                return true;
            };
            return false;
        },
        outerHTML: function (_0x9e20xe) {
            return _0x9e20x4("<p>")["append"](_0x9e20x4(_0x9e20xe)["eq"](0)["clone"]())["html"]();
        },
        normalize: function (_0x9e20x34) {
            return parseInt(_0x9e20x34["replace"]("px", ""), 10);
        },
        isMobile: function (_0x9e20xb7) {
            if (_0x9e20xb7 === true && /(iPhone|iPod|iPad|BlackBerry|Android)/ ["test"](navigator["userAgent"])) {
                return true;
            } else {
                if (/(iPhone|iPod|BlackBerry|Android)/ ["test"](navigator["userAgent"])) {
                    return true;
                } else {
                    return false;
                };
            };
        }
    };
    _0x9e20x4["fn"]["getObject"] = function () {
        return this["data"]("redactor");
    };
    _0x9e20x4["fn"]["getEditor"] = function () {
        return this["data"]("redactor")["$editor"];
    };
    _0x9e20x4["fn"]["getCode"] = function () {
        return _0x9e20x4["trim"](this["data"]("redactor")["getCode"]());
    };
    _0x9e20x4["fn"]["getText"] = function () {
        return this["data"]("redactor")["$editor"]["text"]();
    };
    _0x9e20x4["fn"]["getSelected"] = function () {
        return this["data"]("redactor")["getSelectedHtml"]();
    };
    _0x9e20x4["fn"]["setCode"] = function (_0x9e20x16) {
        this["data"]("redactor")["setCode"](_0x9e20x16);
    };
    _0x9e20x4["fn"]["insertHtml"] = function (_0x9e20x16) {
        this["data"]("redactor")["insertHtml"](_0x9e20x16);
    };
    _0x9e20x4["fn"]["destroyEditor"] = function () {
        this["each"](function () {
            if (typeof _0x9e20x4(this)["data"]("redactor") != "undefined") {
                _0x9e20x4(this)["data"]("redactor")["destroy"]();
                _0x9e20x4(this)["removeData"]("redactor");
            };
        });
    };
    _0x9e20x4["fn"]["setFocus"] = function () {
        this["data"]("redactor")["$editor"]["focus"]();
    };
    _0x9e20x4["fn"]["execCommand"] = function (_0x9e20x17, _0x9e20x2f) {
        this["data"]("redactor")["execCommand"](_0x9e20x17, _0x9e20x2f);
    };
})(jQuery);
(function (_0x9e20x4) {
    "use strict";
    _0x9e20x4["fn"]["dragupload"] = function (_0x9e20xa) {
        return this["each"](function () {
            var _0x9e20x4f = new _0x9e20xb8(this, _0x9e20xa);
            _0x9e20x4f["init"]();
        });
    };

    function _0x9e20xb8(_0x9e20x28, _0x9e20xa) {
        this["opts"] = _0x9e20x4["extend"]({
            url: false,
            success: false,
            error: false,
            preview: false,
            uploadFields: false,
            text: RLANG["drop_file_here"],
            atext: RLANG["or_choose"]
        }, _0x9e20xa);
        this["$el"] = _0x9e20x4(_0x9e20x28);
    };
    _0x9e20xb8["prototype"] = {
        init: function () {
            if (navigator["userAgent"]["search"]("MSIE") === -1) {
                this["droparea"] = _0x9e20x4("<div class=\"redactor_droparea\"></div>");
                this["dropareabox"] = _0x9e20x4("<div class=\"redactor_dropareabox\">" + this["opts"]["text"] + "</div>");
                this["dropalternative"] = _0x9e20x4("<div class=\"redactor_dropalternative\">" + this["opts"]["atext"] + "</div>");
                this["droparea"]["append"](this["dropareabox"]);
                this["$el"]["before"](this["droparea"]);
                this["$el"]["before"](this["dropalternative"]);
                this["dropareabox"]["bind"]("dragover", _0x9e20x4["proxy"](function () {
                    return this["ondrag"]();
                }, this));
                this["dropareabox"]["bind"]("dragleave", _0x9e20x4["proxy"](function () {
                    return this["ondragleave"]();
                }, this));
                var _0x9e20xb9 = _0x9e20x4["proxy"](function (_0x9e20x13) {
                    var _0x9e20xba = parseInt(_0x9e20x13["loaded"] / _0x9e20x13["total"] * 100, 10);
                    this["dropareabox"]["text"]("Loading " + _0x9e20xba + "%");
                }, this);
                var _0x9e20xbb = jQuery["ajaxSettings"]["xhr"]();
                if (_0x9e20xbb["upload"]) {
                    _0x9e20xbb["upload"]["addEventListener"]("progress", _0x9e20xb9, false);
                };
                var _0x9e20xbc = function () {
                    return _0x9e20xbb;
                };
                this["dropareabox"]["get"](0)["ondrop"] = _0x9e20x4["proxy"](function (_0x9e20xbd) {
                    _0x9e20xbd["preventDefault"]();
                    this["dropareabox"]["removeClass"]("hover")["addClass"]("drop");
                    var _0x9e20xbe = _0x9e20xbd["dataTransfer"]["files"][0];
                    var _0x9e20xbf = new FormData();
                    if (this["opts"]["uploadFields"] !== false && typeof this["opts"]["uploadFields"] === "object") {
                        _0x9e20x4["each"](this["opts"]["uploadFields"], _0x9e20x4["proxy"](function (_0x9e20x73, _0x9e20x9b) {
                            if (_0x9e20x9b.toString()["indexOf"]("#") === 0) {
                                _0x9e20x9b = _0x9e20x4(_0x9e20x9b)["val"]();
                            };
                            _0x9e20xbf["append"](_0x9e20x73, _0x9e20x9b);
                        }, this));
                    };
                    _0x9e20xbf["append"]("file", _0x9e20xbe);
                    _0x9e20x4["ajax"]({
                        url: this["opts"]["url"],
                        dataType: "html",
                        data: _0x9e20xbf,
                        xhr: _0x9e20xbc,
                        cache: false,
                        contentType: false,
                        processData: false,
                        type: "POST",
                        success: _0x9e20x4["proxy"](function (_0x9e20x7) {
                            var _0x9e20x9d = _0x9e20x4["parseJSON"](_0x9e20x7);
                            if (typeof _0x9e20x9d["error"] == "undefined") {
                                this["opts"]["success"](_0x9e20x9d);
                            } else {
                                this["opts"]["error"](this, _0x9e20x9d);
                                this["opts"]["success"](false);
                            };
                        }, this)
                    });
                }, this);
            };
        },
        ondrag: function () {
            this["dropareabox"]["addClass"]("hover");
            return false;
        },
        ondragleave: function () {
            this["dropareabox"]["removeClass"]("hover");
            return false;
        }
    };
})(jQuery);
(function (_0x9e20x4) {
    "use strict";
    var _0x9e20xc0 = "http://";
    var _0x9e20xc1 = /(^|&lt;|\s)(www\..+?\..+?)(\s|&gt;|$)/g,
        _0x9e20xc2 = /(^|&lt;|\s)(((https?|ftp):\/\/|mailto:).+?)(\s|&gt;|$)/g,
        _0x9e20xc3 = function () {
            var _0x9e20xc4 = this["childNodes"],
                _0x9e20xd = _0x9e20xc4["length"];
            while (_0x9e20xd--) {
                var _0x9e20xc5 = _0x9e20xc4[_0x9e20xd];
                if (_0x9e20xc5["nodeType"] === 3) {
                    var _0x9e20x16 = _0x9e20xc5["nodeValue"];
                    if (_0x9e20x16) {
                        _0x9e20x16 = _0x9e20x16["replace"](/&/g, "&amp;")["replace"](/</g, "&lt;")["replace"](/>/g, "&gt;")["replace"](_0x9e20xc1, "$1<a href=\"" + _0x9e20xc0 + "$2\">$2</a>$3")["replace"](_0x9e20xc2, "$1<a href=\"$2\">$2</a>$5");
                        _0x9e20x4(_0x9e20xc5)["after"](_0x9e20x16)["remove"]();
                    };
                } else {
                    if (_0x9e20xc5["nodeType"] === 1 && !/^(a|button|textarea)$/i ["test"](_0x9e20xc5["tagName"])) {
                        _0x9e20xc3["call"](_0x9e20xc5);
                    };
                };
            };
        };
    _0x9e20x4["fn"]["linkify"] = function () {
        this["each"](_0x9e20xc3);
    };
})(jQuery);
(function (_0x9e20x4) {
    _0x9e20x4["event"]["special"]["textselect"] = {
        setup: function (_0x9e20x7, _0x9e20xc6) {
            _0x9e20x4(this)["data"]("textselected", false);
            _0x9e20x4(this)["data"]("ttt", _0x9e20x7);
            _0x9e20x4(this)["on"]("mouseup", _0x9e20x4["event"]["special"]["textselect"]["handler"]);
        },
        teardown: function (_0x9e20x7) {
            _0x9e20x4(this)["off"]("mouseup", _0x9e20x4["event"]["special"]["textselect"]["handler"]);
        },
        handler: function (_0x9e20xbd) {
            var _0x9e20x7 = _0x9e20x4(this)["data"]("ttt");
            var _0x9e20x9f = _0x9e20x4["event"]["special"]["textselect"]["getSelectedText"](_0x9e20x7)
                .toString();
            if (_0x9e20x9f != "") {
                _0x9e20x4(this)["data"]("textselected", true);
                _0x9e20xbd["type"] = "textselect";
                _0x9e20xbd["text"] = _0x9e20x9f;
                _0x9e20x4["event"]["dispatch"]["apply"](this, arguments);
            };
        },
        getSelectedText: function (_0x9e20x7) {
            var _0x9e20x9f = "";
            if (rwindow["getSelection"]) {
                _0x9e20x9f = rwindow["getSelection"]();
            } else {
                if (rdocument["getSelection"]) {
                    _0x9e20x9f = rdocument["getSelection"]();
                } else {
                    if (rdocument["selection"]) {
                        _0x9e20x9f = rdocument["selection"]["createRange"]()["text"];
                    };
                };
            };
            return _0x9e20x9f;
        }
    };
    _0x9e20x4["event"]["special"]["textunselect"] = {
        setup: function (_0x9e20x7, _0x9e20xc6) {
            _0x9e20x4(this)["data"]("rttt", _0x9e20x7);
            _0x9e20x4(this)["data"]("textselected", false);
            _0x9e20x4(this)["on"]("mouseup", _0x9e20x4["event"]["special"]["textunselect"]["handler"]);
            _0x9e20x4(this)["on"]("keyup", _0x9e20x4["event"]["special"]["textunselect"]["handlerKey"]);
        },
        teardown: function (_0x9e20x7) {
            _0x9e20x4(this)["unbind"]("mouseup", _0x9e20x4["event"]["special"]["textunselect"]["handler"]);
        },
        handler: function (_0x9e20xbd) {
            if (_0x9e20x4(this)["data"]("textselected")) {
                var _0x9e20x7 = _0x9e20x4(this)["data"]("rttt");
                var _0x9e20x9f = _0x9e20x4["event"]["special"]["textselect"]["getSelectedText"](_0x9e20x7)
                    .toString();
                if (_0x9e20x9f == "") {
                    _0x9e20x4(this)["data"]("textselected", false);
                    _0x9e20xbd["type"] = "textunselect";
                    _0x9e20x4["event"]["dispatch"]["apply"](this, arguments);
                };
            };
        },
        handlerKey: function (_0x9e20xbd) {
            if (_0x9e20x4(this)["data"]("textselected")) {
                var _0x9e20x7 = _0x9e20x4(this)["data"]("rttt");
                var _0x9e20x9f = _0x9e20x4["event"]["special"]["textselect"]["getSelectedText"](_0x9e20x7)
                    .toString();
                if ((_0x9e20xbd["keyCode"] = 27) && (_0x9e20x9f == "")) {
                    _0x9e20x4(this)["data"]("textselected", false);
                    _0x9e20xbd["type"] = "textunselect";
                    _0x9e20x4["event"]["dispatch"]["apply"](this, arguments);
                };
            };
        }
    };
})(jQuery);