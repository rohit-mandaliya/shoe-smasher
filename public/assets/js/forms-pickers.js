"use strict";
!(function () {
    const e = document.querySelector("#flatpickr-date"),
        from = document.querySelector("#flatpickr-date-from"),
        to = document.querySelector("#flatpickr-date-to"),
        addAccount = document.querySelector("#flatpickr-date-add-account"),
        t = document.querySelector("#flatpickr-time"),
        a = document.querySelector("#flatpickr-datetime"),
        i = document.querySelector("#flatpickr-multi"),
        r = document.querySelector("#flatpickr-range"),
        n = document.querySelector("#flatpickr-inline"),
        o = document.querySelector("#flatpickr-human-friendly"),
        l = document.querySelector("#flatpickr-disabled-range");
    if (
        (e && e.flatpickr({ monthSelectorType: "static" }),
        from &&
            from.flatpickr({ monthSelectorType: "static", maxDate: "today" }),
        to && to.flatpickr({ monthSelectorType: "static", maxDate: "today" }),
        addAccount &&
            addAccount.flatpickr({
                monthSelectorType: "static",
                minDate: "today",
            }),
        t && t.flatpickr({ enableTime: !0, noCalendar: !0 }),
        a && a.flatpickr({ enableTime: !0, dateFormat: "Y-m-d H:i" }),
        i &&
            i.flatpickr({
                weekNumbers: !0,
                enableTime: !0,
                mode: "multiple",
                minDate: "today",
            }),
        null != typeof r && r.flatpickr({ mode: "range" }),
        n &&
            n.flatpickr({
                inline: !0,
                allowInput: !1,
                monthSelectorType: "static",
            }),
        o &&
            o.flatpickr({
                altInput: !0,
                altFormat: "F j, Y",
                dateFormat: "Y-m-d",
            }),
        l)
    ) {
        const e = new Date(Date.now() - 1728e5),
            t = new Date(Date.now() + 1728e5);
        l.flatpickr({
            dateFormat: "Y-m-d",
            disable: [
                {
                    from: e.toISOString().split("T")[0],
                    to: t.toISOString().split("T")[0],
                },
            ],
        });
    }
})(),
    $(function () {
        var e = $("#bs-datepicker-basic"),
            t = $("#bs-datepicker-format"),
            a = $("#bs-datepicker-daterange"),
            i = $("#bs-datepicker-disabled-days"),
            r = $("#bs-datepicker-multidate"),
            n = $("#bs-datepicker-options"),
            o = $("#bs-datepicker-autoclose"),
            l = $("#bs-datepicker-inline");
        e.length &&
            e.datepicker({
                todayHighlight: !0,
                orientation: isRtl ? "auto right" : "auto left",
            }),
            t.length &&
                t.datepicker({
                    todayHighlight: !0,
                    format: "dd/mm/yyyy",
                    orientation: isRtl ? "auto right" : "auto left",
                }),
            a.length &&
                a.datepicker({
                    todayHighlight: !0,
                    orientation: isRtl ? "auto right" : "auto left",
                }),
            i.length &&
                i.datepicker({
                    todayHighlight: !0,
                    daysOfWeekDisabled: [0, 6],
                    orientation: isRtl ? "auto right" : "auto left",
                }),
            r.length &&
                r.datepicker({
                    multidate: !0,
                    todayHighlight: !0,
                    orientation: isRtl ? "auto right" : "auto left",
                }),
            n.length &&
                n.datepicker({
                    calendarWeeks: !0,
                    clearBtn: !0,
                    todayHighlight: !0,
                    orientation: isRtl ? "auto left" : "auto right",
                }),
            o.length &&
                o.datepicker({
                    todayHighlight: !0,
                    autoclose: !0,
                    orientation: isRtl ? "auto right" : "auto left",
                }),
            l.length && l.datepicker({ todayHighlight: !0 });
        var c = $("#bs-rangepicker-basic"),
            s = $("#bs-rangepicker-single"),
            m = $("#bs-rangepicker-time"),
            p = $("#bs-rangepicker-range"),
            g = $("#bs-rangepicker-week-num"),
            h = $("#bs-rangepicker-dropdown");
        c.length && c.daterangepicker({ opens: isRtl ? "left" : "right" }),
            s.length &&
                s.daterangepicker({
                    singleDatePicker: !0,
                    opens: isRtl ? "left" : "right",
                }),
            m.length &&
                m.daterangepicker({
                    timePicker: !0,
                    timePickerIncrement: 30,
                    locale: { format: "MM/DD/YYYY h:mm A" },
                    opens: isRtl ? "left" : "right",
                }),
            p.length &&
                p.daterangepicker({
                    ranges: {
                        Today: [moment(), moment()],
                        Yesterday: [
                            moment().subtract(1, "days"),
                            moment().subtract(1, "days"),
                        ],
                        "Last 7 Days": [moment().subtract(6, "days"), moment()],
                        "Last 30 Days": [
                            moment().subtract(29, "days"),
                            moment(),
                        ],
                        "This Month": [
                            moment().startOf("month"),
                            moment().endOf("month"),
                        ],
                        "Last Month": [
                            moment().subtract(1, "month").startOf("month"),
                            moment().subtract(1, "month").endOf("month"),
                        ],
                    },
                    opens: isRtl ? "left" : "right",
                    maxDate: new Date(),
                }),
            g.length &&
                g.daterangepicker({
                    showWeekNumbers: !0,
                    opens: isRtl ? "left" : "right",
                }),
            h.length &&
                h.daterangepicker({
                    showDropdowns: !0,
                    opens: isRtl ? "left" : "right",
                });
        var d = $("#timepicker-basic"),
            k = $("#timepicker-min-max"),
            u = $("#timepicker-disabled-times"),
            b = $("#timepicker-format"),
            f = $("#timepicker-step"),
            y = $("#timepicker-24hours");
        d.length && d.timepicker({ orientation: isRtl ? "r" : "l" }),
            k.length &&
                k.timepicker({
                    minTime: "2:00pm",
                    maxTime: "7:00pm",
                    showDuration: !0,
                    orientation: isRtl ? "r" : "l",
                }),
            u.length &&
                u.timepicker({
                    disableTimeRanges: [
                        ["12am", "3am"],
                        ["4am", "4:30am"],
                    ],
                    orientation: isRtl ? "r" : "l",
                }),
            b.length &&
                b.timepicker({
                    timeFormat: "H:i:s",
                    orientation: isRtl ? "r" : "l",
                }),
            f.length &&
                f.timepicker({ step: 15, orientation: isRtl ? "r" : "l" }),
            y.length &&
                y.timepicker({
                    show: "24:00",
                    timeFormat: "H:i:s",
                    orientation: isRtl ? "r" : "l",
                });
    }),
    (function () {
        const e = document.querySelector("#color-picker-classic"),
            t = document.querySelector("#color-picker-monolith"),
            a = document.querySelector("#color-picker-nano");
        e &&
            pickr.create({
                el: e,
                theme: "classic",
                default: "rgba(102, 108, 232, 1)",
                swatches: [
                    "rgba(102, 108, 232, 1)",
                    "rgba(40, 208, 148, 1)",
                    "rgba(255, 73, 97, 1)",
                    "rgba(255, 145, 73, 1)",
                    "rgba(30, 159, 242, 1)",
                ],
                components: {
                    preview: !0,
                    opacity: !0,
                    hue: !0,
                    interaction: {
                        hex: !0,
                        rgba: !0,
                        hsla: !0,
                        hsva: !0,
                        cmyk: !0,
                        input: !0,
                        clear: !0,
                        save: !0,
                    },
                },
            }),
            t &&
                pickr.create({
                    el: t,
                    theme: "monolith",
                    default: "rgba(40, 208, 148, 1)",
                    swatches: [
                        "rgba(102, 108, 232, 1)",
                        "rgba(40, 208, 148, 1)",
                        "rgba(255, 73, 97, 1)",
                        "rgba(255, 145, 73, 1)",
                        "rgba(30, 159, 242, 1)",
                    ],
                    components: {
                        preview: !0,
                        opacity: !0,
                        hue: !0,
                        interaction: {
                            hex: !0,
                            rgba: !0,
                            hsla: !0,
                            hsva: !0,
                            cmyk: !0,
                            input: !0,
                            clear: !0,
                            save: !0,
                        },
                    },
                }),
            a &&
                pickr.create({
                    el: a,
                    theme: "nano",
                    default: "rgba(255, 73, 97, 1)",
                    swatches: [
                        "rgba(102, 108, 232, 1)",
                        "rgba(40, 208, 148, 1)",
                        "rgba(255, 73, 97, 1)",
                        "rgba(255, 145, 73, 1)",
                        "rgba(30, 159, 242, 1)",
                    ],
                    components: {
                        preview: !0,
                        opacity: !0,
                        hue: !0,
                        interaction: {
                            hex: !0,
                            rgba: !0,
                            hsla: !0,
                            hsva: !0,
                            cmyk: !0,
                            input: !0,
                            clear: !0,
                            save: !0,
                        },
                    },
                });
    })();
