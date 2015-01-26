function gen_dial(obj, value) {
    obj.highcharts({
        chart: {
            type: "gauge",
            plotBackgroundColor: null,
            plotBackgroundImage: null,
            plotBorderWidth: 0,
            plotShadow: false,
            height: 290,
        },
        credits: {"enabled": false},
        title: {
            text: ""
        },
        pane: {
            startAngle: -90,
            endAngle: 90,
            background: null,
        },
        yAxis: {
            min: 0,
            max: 100,
            minorTickInterval: "auto",
            minorTickWidth: 1,
            minorTickLength: 10,
            minorTickPosition: "inside",
            minorTickColor: "#666",
            tickPixelInterval: 30,
            tickWidth: 2,
            tickPosition: "inside",
            tickLength: 15,
            tickColor: "#666",
            labels: {
                step: 2,
                rotation: "auto"
            },
            title: {
                text: "ร้อยละ " + value
            },
            plotBands: [{
                    from: 0,
                    to: 60,
                    color: "#DF5353" // red 
                }, {
                    from: 60,
                    to: 80,
                    color: "#DDDF0D"// yellow
                }, {
                    from: 80,
                    to: 100,
                    color: "#55BF3B" // green
                }]
        },
        series: [{
                name: "ร้อยละ",
                data: [value],
                tooltip: {
                    valueSuffix: " "
                }
            }]// จบ content
    });// จบ chart
}