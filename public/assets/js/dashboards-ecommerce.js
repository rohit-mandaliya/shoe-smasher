"use strict";
!(function () {
    let o, e, t, r, a, s;
    isDarkStyle
        ? ((o = config.colors_dark.cardColor),
          (e = config.colors_dark.headingColor),
          (t = config.colors_dark.textMuted),
          (r = config.colors_dark.bodyColor),
          (a = config.colors_dark.borderColor),
          (s = "dark"))
        : ((o = config.colors.white),
          (e = config.colors.headingColor),
          (t = config.colors.textMuted),
          (r = config.colors.bodyColor),
          (a = config.colors.borderColor),
          (s = "light"));
    const i = document.querySelector("#visitsRadialChart"),
        l = {
            chart: { height: 270, type: "radialBar" },
            colors: [
                config.colors.primary,
                config.colors.danger,
                config.colors.warning,
            ],
            series: [75, 80, 85],
            plotOptions: {
                radialBar: {
                    offsetY: -10,
                    hollow: { size: "45%" },
                    track: { margin: 10, background: o },
                    dataLabels: {
                        name: {
                            fontSize: "15px",
                            colors: [r],
                            fontFamily: "IBM Plex Sans",
                            offsetY: 25,
                        },
                        value: {
                            fontSize: "2rem",
                            fontFamily: "Rubik",
                            fontWeight: 500,
                            color: e,
                            offsetY: -15,
                        },
                        total: {
                            show: !0,
                            label: "Total Visits",
                            fontSize: "15px",
                            fontWeight: 400,
                            fontFamily: "IBM Plex Sans",
                            color: r,
                        },
                    },
                },
            },
            grid: { padding: { top: -10, bottom: -10 } },
            stroke: { lineCap: "round" },
            labels: ["Target", "Mart", "Ebay"],
            legend: {
                show: !0,
                position: "bottom",
                horizontalAlign: "center",
                labels: { colors: r, useSeriesColors: !1 },
                itemMargin: { horizontal: 15 },
                markers: { width: 10, height: 10, offsetX: -3 },
            },
        };
    if (void 0 !== typeof i && null !== i) {
        new ApexCharts(i, l).render();
    }
    const n = document.querySelector("#revenueGrowthChart"),
        c = {
            chart: {
                height: 90,
                type: "bar",
                stacked: !0,
                toolbar: { show: !1 },
            },
            grid: {
                show: !1,
                padding: { left: 0, right: 0, top: -20, bottom: -20 },
            },
            plotOptions: {
                bar: {
                    horizontal: !1,
                    columnWidth: "20%",
                    borderRadius: 2,
                    startingShape: "rounded",
                    endingShape: "flat",
                },
            },
            legend: { show: !1 },
            dataLabels: { enabled: !1 },
            colors: [config.colors.info, config.colors_label.secondary],
            series: [
                {
                    name: "2020",
                    data: [
                        80, 60, 125, 40, 50, 30, 70, 80, 100, 40, 80, 60, 120,
                        75, 25, 135, 65,
                    ],
                },
                {
                    name: "2021",
                    data: [
                        50, 65, 40, 100, 30, 30, 80, 20, 50, 45, 30, 90, 70, 40,
                        50, 40, 60,
                    ],
                },
            ],
            xaxis: {
                categories: [
                    "10",
                    "",
                    "",
                    "",
                    "",
                    "",
                    "",
                    "",
                    "15",
                    "",
                    "",
                    "",
                    "",
                    "",
                    "",
                    "",
                    "20",
                ],
                axisBorder: { show: !1 },
                axisTicks: { show: !1 },
                labels: { style: { colors: t }, offsetY: -5 },
            },
            yaxis: { show: !1, floating: !0 },
            tooltip: { x: { show: !1 } },
        };
    if (void 0 !== typeof n && null !== n) {
        new ApexCharts(n, c).render();
    }
    const d = document.querySelector("#orderSummaryChart"),
        h = {
            chart: {
                height: 230,
                type: "area",
                toolbar: !1,
                dropShadow: {
                    enabled: !0,
                    top: 18,
                    left: 2,
                    blur: 3,
                    color: config.colors.primary,
                    opacity: 0.15,
                },
            },
            markers: {
                size: 6,
                colors: "transparent",
                strokeColors: "transparent",
                strokeWidth: 4,
                discrete: [
                    {
                        fillColor: o,
                        seriesIndex: 0,
                        dataPointIndex: 9,
                        strokeColor: config.colors.primary,
                        strokeWidth: 4,
                        size: 6,
                        radius: 2,
                    },
                ],
                hover: { size: 7 },
            },
            series: [{ data: [15, 18, 13, 19, 16, 31, 18, 26, 23, 39] }],
            dataLabels: { enabled: !1 },
            stroke: { curve: "smooth", lineCap: "round" },
            colors: [config.colors.primary],
            fill: {
                type: "gradient",
                gradient: {
                    shade: s,
                    shadeIntensity: 0.8,
                    opacityFrom: 0.7,
                    opacityTo: 0.25,
                    stops: [0, 95, 100],
                },
            },
            grid: {
                show: !0,
                borderColor: a,
                padding: { top: -15, bottom: -10, left: 15, right: 10 },
            },
            xaxis: {
                categories: [
                    "Jan",
                    "Feb",
                    "Mar",
                    "Apr",
                    "May",
                    "Jun",
                    "Jul",
                    "Aug",
                    "Sep",
                    "Oct",
                ],
                labels: { offsetX: 0, style: { colors: t, fontSize: "13px" } },
                axisBorder: { show: !1 },
                axisTicks: { show: !1 },
                lines: { show: !1 },
            },
            yaxis: {
                labels: {
                    offsetX: 7,
                    formatter: function (o) {
                        return "$" + o;
                    },
                    style: { fontSize: "13px", colors: t },
                },
                min: 0,
                max: 40,
                tickAmount: 4,
            },
        };
    if (void 0 !== typeof d && null !== d) {
        new ApexCharts(d, h).render();
    }

    var followerChart = document.querySelector("#followerChart"),
        fChart = {
            chart: {
                height: 230,
                type: "area",
                toolbar: !1,
                dropShadow: {
                    enabled: !0,
                    top: 18,
                    left: 2,
                    blur: 3,
                    color: config.colors.primary,
                    opacity: 0.15,
                },
            },
            // markers: {
            //     size: 6,
            //     colors: "transparent",
            //     strokeColors: "transparent",
            //     strokeWidth: 4,
            //     discrete: [
            //         {
            //             fillColor: o,
            //             seriesIndex: 0,
            //             dataPointIndex: 9,
            //             strokeColor: config.colors.primary,
            //             strokeWidth: 4,
            //             size: 6,
            //             radius: 2,
            //         },
            //     ],
            //     hover: { size: 7 },
            // },
            series: [
                {
                    name: "Followers",
                    data: followerData,
                },
            ],
            dataLabels: { enabled: !1 },
            stroke: { curve: "smooth", lineCap: "round" },
            colors: [config.colors.primary],
            fill: {
                type: "gradient",
                gradient: {
                    shade: s,
                    shadeIntensity: 0.8,
                    opacityFrom: 0.7,
                    opacityTo: 0.25,
                    stops: [0, 95, 100],
                },
            },
            grid: {
                show: !0,
                borderColor: a,
                padding: { top: -15, bottom: -10, left: 15, right: 10 },
            },
            xaxis: {
                categories: Days,
                tickAmount: 7,
                labels: {
                    offsetX: 0,
                    formatter: function (value) {
                        var d = new Date(value);
                        var options = {
                            day: "numeric",
                            month: "short",
                        };
                        return d.toLocaleDateString("en-US", options);
                    },
                    style: { colors: t, fontSize: "13px" },
                },
                axisBorder: { show: !1 },
                axisTicks: { show: !1 },
                lines: { show: !1 },
            },
            yaxis: {
                labels: {
                    offsetX: 7,
                    formatter: function (o) {
                        return o;
                    },
                    style: { fontSize: "13px", colors: t },
                },

                tickAmount: 4,
            },
        };
    if (void 0 !== typeof followerChart && null !== followerChart) {
        new ApexCharts(followerChart, fChart).render();
    }

    var likesChart = document.querySelector("#likeChart"),
        lChart = {
            chart: {
                height: 230,
                type: "area",
                toolbar: !1,
                dropShadow: {
                    enabled: !0,
                    top: 18,
                    left: 2,
                    blur: 3,
                    color: config.colors.primary,
                    opacity: 0.15,
                },
            },
            // markers: {
            //     size: 6,
            //     colors: "transparent",
            //     strokeColors: "transparent",
            //     strokeWidth: 4,
            //     discrete: [
            //         {
            //             fillColor: o,
            //             seriesIndex: 0,
            //             dataPointIndex: 9,
            //             strokeColor: config.colors.primary,
            //             strokeWidth: 4,
            //             size: 6,
            //             radius: 2,
            //         },
            //     ],
            //     hover: { size: 7 },
            // },
            series: [
                {
                    name: "Likes",
                    data: likeData,
                },
            ],
            dataLabels: { enabled: !1 },
            stroke: { curve: "smooth", lineCap: "round" },
            colors: [config.colors.primary],
            fill: {
                type: "gradient",
                gradient: {
                    shade: s,
                    shadeIntensity: 0.8,
                    opacityFrom: 0.7,
                    opacityTo: 0.25,
                    stops: [0, 95, 100],
                },
            },
            grid: {
                show: !0,
                borderColor: a,
                padding: { top: -15, bottom: -10, left: 15, right: 10 },
            },
            xaxis: {
                categories: Days,
                tickAmount: 7,
                labels: {
                    offsetX: 0,
                    formatter: function (value) {
                        var d = new Date(value);
                        var options = {
                            day: "numeric",
                            month: "short",
                        };
                        return d.toLocaleDateString("en-US", options);
                    },
                    style: { colors: t, fontSize: "13px" },
                },
                axisBorder: { show: !1 },
                axisTicks: { show: !1 },
                lines: { show: !1 },
            },
            yaxis: {
                labels: {
                    offsetX: 7,
                    formatter: function (o) {
                        return o;
                    },
                    style: { fontSize: "13px", colors: t },
                },

                tickAmount: 4,
            },
        };
    if (void 0 !== typeof likesChart && null !== likesChart) {
        new ApexCharts(likesChart, lChart).render();
    }

    var viewsChart = document.querySelector("#viewChart"),
        vChart = {
            chart: {
                height: 230,
                type: "area",
                toolbar: !1,
                dropShadow: {
                    enabled: !0,
                    top: 18,
                    left: 2,
                    blur: 3,
                    color: config.colors.primary,
                    opacity: 0.15,
                },
            },
            // markers: {
            //     size: 6,
            //     colors: "transparent",
            //     strokeColors: "transparent",
            //     strokeWidth: 4,
            //     discrete: [
            //         {
            //             fillColor: o,
            //             seriesIndex: 0,
            //             dataPointIndex: 9,
            //             strokeColor: config.colors.primary,
            //             strokeWidth: 4,
            //             size: 6,
            //             radius: 2,
            //         },
            //     ],
            //     hover: { size: 7 },
            // },
            series: [
                {
                    name: "Views",
                    data: viewData ? viewData : "",
                },
            ],
            dataLabels: { enabled: !1 },
            stroke: { curve: "smooth", lineCap: "round" },
            colors: [config.colors.primary],
            fill: {
                type: "gradient",
                gradient: {
                    shade: s,
                    shadeIntensity: 0.8,
                    opacityFrom: 0.7,
                    opacityTo: 0.25,
                    stops: [0, 95, 100],
                },
            },
            grid: {
                show: !0,
                borderColor: a,
                padding: { top: -15, bottom: -10, left: 15, right: 10 },
            },
            xaxis: {
                categories: Days,
                tickAmount: 7,
                labels: {
                    offsetX: 0,
                    formatter: function (value) {
                        var d = new Date(value);
                        var options = {
                            day: "numeric",
                            month: "short",
                        };
                        return d.toLocaleDateString("en-US", options);
                    },
                    style: { colors: t, fontSize: "13px" },
                },
                axisBorder: { show: !1 },
                axisTicks: { show: !1 },
                lines: { show: !1 },
            },
            yaxis: {
                labels: {
                    offsetX: 7,
                    formatter: function (o) {
                        return o;
                    },
                    style: { fontSize: "13px", colors: t },
                },

                tickAmount: 4,
            },
        };
    if (void 0 !== typeof viewsChart && null !== viewsChart) {
        new ApexCharts(viewsChart, vChart).render();
    }

    const engagementChart = document.querySelector("#engagementChart"),
        eChart = {
            chart: {
                height: 230,
                type: "area",
                toolbar: !1,
                dropShadow: {
                    enabled: !0,
                    top: 18,
                    left: 2,
                    blur: 3,
                    color: config.colors.primary,
                    opacity: 0.15,
                },
            },
            // markers: {
            //     size: 6,
            //     colors: "transparent",
            //     strokeColors: "transparent",
            //     strokeWidth: 4,
            //     discrete: [
            //         {
            //             fillColor: o,
            //             seriesIndex: 0,
            //             dataPointIndex: 9,
            //             strokeColor: config.colors.primary,
            //             strokeWidth: 4,
            //             size: 6,
            //             radius: 2,
            //         },
            //     ],
            //     hover: { size: 7 },
            // },
            series: [
                {
                    name: "Engagement",
                    data: engagementData,
                },
            ],
            dataLabels: { enabled: !1 },
            stroke: { curve: "smooth", lineCap: "round" },
            colors: [config.colors.primary],
            fill: {
                type: "gradient",
                gradient: {
                    shade: s,
                    shadeIntensity: 0.8,
                    opacityFrom: 0.7,
                    opacityTo: 0.25,
                    stops: [0, 95, 100],
                },
            },
            grid: {
                show: !0,
                borderColor: a,
                padding: { top: -15, bottom: -10, left: 15, right: 10 },
            },
            xaxis: {
                categories: Days,
                tickAmount: 7,
                labels: {
                    offsetX: 0,
                    formatter: function (value) {
                        var d = new Date(value);
                        var options = {
                            day: "numeric",
                            month: "short",
                        };
                        return d.toLocaleDateString("en-US", options);
                    },
                    style: { colors: t, fontSize: "13px" },
                },
                axisBorder: { show: !1 },
                axisTicks: { show: !1 },
                lines: { show: !1 },
            },
            yaxis: {
                labels: {
                    offsetX: 7,
                    formatter: function (o) {
                        return o.toFixed(2);
                    },
                    style: { fontSize: "13px", colors: t },
                },

                decimalsInFloat: undefined,
                tickAmount: 4,
            },
        };
    if (void 0 !== typeof engagementChart && null !== engagementChart) {
        new ApexCharts(engagementChart, eChart).render();
    }

    const filterChart = document.querySelector("#filterChart"),
        filChart = {
            chart: {
                height: 230,
                type: "area",
                toolbar: {
                    show: false,
                    offsetX: -10,
                    offsetY: -20,
                    tools: {
                        download: true,
                        selection: true,
                        zoom: true,
                        zoomin: true,
                        zoomout: true,
                        pan: true,
                        reset:
                            true |
                            '<img src="/static/icons/reset.png" width="20">',
                        customIcons: [],
                    },
                    export: {
                        csv: {
                            filename: undefined,
                            columnDelimiter: ",",
                            headerCategory: "category",
                            headerValue: "value",
                            dateFormatter(timestamp) {
                                return new Date(timestamp).toDateString();
                            },
                        },
                        svg: {
                            filename: undefined,
                        },
                        png: {
                            filename: undefined,
                        },
                    },
                    autoSelected: "zoom",
                },
                dropShadow: {
                    enabled: !0,
                    top: 18,
                    left: 2,
                    blur: 3,
                    color: config.colors.primary,
                    opacity: 0.15,
                },
            },
            // markers: {
            //     size: 6,
            //     colors: "transparent",
            //     strokeColors: "transparent",
            //     strokeWidth: 4,
            //     discrete: [
            //         {
            //             fillColor: o,
            //             seriesIndex: 0,
            //             dataPointIndex: 9,
            //             strokeColor: config.colors.primary,
            //             strokeWidth: 4,
            //             size: 6,
            //             radius: 2,
            //         },
            //     ],
            //     hover: { size: 7 },
            // },
            series: [
                {
                    name: attribute_name,
                    // data: [45, 45],
                    data: filterData,
                },
            ],
            dataLabels: { enabled: !1 },
            stroke: { curve: "smooth", lineCap: "round" },
            colors: [config.colors.primary],
            fill: {
                type: "gradient",
                gradient: {
                    shade: s,
                    shadeIntensity: 0.8,
                    opacityFrom: 0.7,
                    opacityTo: 0.25,
                    stops: [0, 95, 100],
                },
            },
            grid: {
                show: !0,
                borderColor: a,
                padding: { top: -15, bottom: -10, left: 15, right: 10 },
            },
            xaxis: {
                categories: filterDays,
                tickAmount: 7,
                labels: {
                    offsetX: 0,
                    formatter: function (value) {
                        var d = new Date(value);
                        var options = {
                            day: "numeric",
                            month: "short",
                        };
                        return d.toLocaleDateString("en-US", options);
                    },
                    style: { colors: t, fontSize: "13px" },
                },
                axisBorder: { show: !1 },
                axisTicks: { show: !1 },
                lines: { show: !1 },
            },
            yaxis: {
                labels: {
                    offsetX: 7,
                    formatter: function (o) {
                        if (Number.isInteger(o)) {
                            return o;
                        }
                        return o.toFixed(2);
                    },
                    style: { fontSize: "13px", colors: t },
                },

                tickAmount: 4,
            },
        };
    if (void 0 !== typeof filterChart && null !== filterChart) {
        new ApexCharts(filterChart, filChart).render();
    }

    const f = document.querySelector("#marketingCampaignChart1"),
        g = {
            chart: {
                height: 55,
                width: 55,
                fontFamily: "IBM Plex Sans",
                type: "donut",
            },
            dataLabels: { enabled: !1 },
            grid: { padding: { top: -5, bottom: -5, left: -2, right: 0 } },
            series: [60, 45, 60],
            stroke: { width: 3, lineCap: "round", colors: o },
            colors: [
                config.colors.primary,
                config.colors.warning,
                config.colors.success,
            ],
            plotOptions: {
                pie: {
                    donut: {
                        size: "65%",
                        labels: {
                            show: !1,
                            value: { show: !1 },
                            total: { show: !1 },
                        },
                    },
                },
            },
            legend: { show: !1 },
            states: { active: { filter: { type: "none" } } },
        };
    if (void 0 !== typeof f && null !== f) {
        new ApexCharts(f, g).render();
    }
    const p = document.querySelector("#marketingCampaignChart2"),
        u = {
            chart: {
                height: 55,
                width: 55,
                fontFamily: "IBM Plex Sans",
                type: "donut",
            },
            dataLabels: { enabled: !1 },
            grid: { padding: { top: -5, bottom: -5, left: -2, right: 0 } },
            series: [60, 30, 30],
            stroke: { width: 3, lineCap: "round", colors: o },
            colors: [
                config.colors.danger,
                config.colors.secondary,
                config.colors.primary,
            ],
            plotOptions: {
                pie: {
                    donut: {
                        size: "65%",
                        labels: {
                            show: !1,
                            value: { show: !1 },
                            total: { show: !1 },
                        },
                    },
                },
            },
            legend: { show: !1 },
            states: { active: { filter: { type: "none" } } },
        };
    if (void 0 !== typeof p && null !== p) {
        new ApexCharts(p, u).render();
    }
})();
