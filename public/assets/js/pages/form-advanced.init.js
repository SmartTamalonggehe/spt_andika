!(function (a) {
    "use strict";
    function e() {}
})(window.jQuery),
    $(function () {
        "use strict";
        var o = $(".docs-date"),
            c = $(".docs-datepicker-container"),
            r = $(".docs-datepicker-trigger"),
            l = {
                show: function (e) {
                    console.log(e.type, e.namespace);
                },
                hide: function (e) {
                    console.log(e.type, e.namespace);
                },
                pick: function (e) {
                    console.log(e.type, e.namespace, e.view);
                },
            };
        o
            .on({
                "show.datepicker": function (e) {
                    console.log(e.type, e.namespace);
                },
                "hide.datepicker": function (e) {
                    console.log(e.type, e.namespace);
                },
                "pick.datepicker": function (e) {
                    console.log(e.type, e.namespace, e.view);
                },
            })
            .datepicker(l),
            $(".docs-options, .docs-toggles").on("change", function (e) {
                var t,
                    a = e.target,
                    s = $(a),
                    n = s.attr("name"),
                    i = "checkbox" === a.type ? a.checked : s.val();
                switch (n) {
                    case "container":
                        i ? (i = c).show() : c.hide();
                        break;
                    case "trigger":
                        i
                            ? (i = r).prop("disabled", !1)
                            : r.prop("disabled", !0);
                        break;
                    case "inline":
                        (t = $('input[name="container"]')).prop("checked") ||
                            t.click();
                        break;
                    case "language":
                        $('input[name="format"]').val(
                            $.fn.datepicker.languages[i].format
                        );
                }
                (l[n] = i),
                    o.datepicker("reset").datepicker("destroy").datepicker(l);
            }),
            $(".docs-actions").on("click", "button", function (e) {
                var t,
                    a = $(this).data(),
                    s = a.arguments || [];
                e.stopPropagation(),
                    a.method &&
                        (a.source
                            ? o.datepicker(a.method, $(a.source).val())
                            : (t = o.datepicker(a.method, s[0], s[1], s[2])) &&
                              a.target &&
                              $(a.target).val(t));
            });
    });
