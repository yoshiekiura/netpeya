$(function () {
    var yearMonths = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        money_in_data = [],
        money_out_data = [];

    $(document).ready(function () {
        getGraphData();

        $('.graph-wallet-selector').on('change', function() {
            var val = $('.graph-wallet-selector').val();
            getGraphData(val);
        });
    });

    function getGraphData(wallet = 0) {
        money_in_data = [],
        money_out_data = [];
        $.ajax({
            url: '/api/get_graph_data',
            type: 'POST',
            dataType: 'json',
            data: {
                'wallet_id': wallet
            },
            success: function (data, textStatus, xhr) {
                if (data.data.success && data['errors'].length == 0) {
                    var money_in = data.data.money_in,
                        money_out = data.data.money_out,
                        total_money_in = parseFloat(data.data.total_money_in),
                        total_money_out = parseFloat(data.data.total_money_out),
                        total = total_money_in + total_money_out;
                    $.each(money_in, function (i, w) {
                        var d = new Date(w[0]);
                        money_in_data.push([d, w[1]]);
                    });
                    $.each(money_out, function (i, w) {
                        var d = new Date(w[0]);
                        money_out_data.push([d, w[1]]);
                    });

                    var pec = (total_money_out / total) * 100;



                    if(total_money_out == 0 && total_money_in > 0) {
                        pec = 0;
                    } else if((total_money_in == 0 && total_money_out > 0) || (total_money_in == 0 && total_money_out == 0)) {
                        pec = 100;
                    }

                    $('#total_money_in').text(myFormatNumber(total_money_in.toFixed(2)));
                    $('#total_money_out').text(myFormatNumber(total_money_out.toFixed(2)));
                    $('#total_available_balance').text(myFormatNumber((total_money_in - total_money_out).toFixed(2)));

                    //if (<?php echo json_encode(2); ?> == 2) {
                        drawGraph();
                        drawArch(pec);
                    //}

                } else {
                    NOTIFY.show('Something is wrong, please try again later.', 'error');
                    $('#transfer_form').stepy('step', 0);
                }
            }
        });
    }

    function drawArch(pec) {
        $("#diff_donut").knob({
            draw: function () {
                $(this.i).val('Volume').css({
                    'font-weight': '400',
                    'font-size': '16px',
                    'color': '#444'
                }) //Puts a percent after values
            }
        });
        $('#diff_donut').val(pec).trigger('change').trigger('draw');
    }

    function drawGraph() {
        var in_data = {
            data: money_in_data,
            color: '#61D395'
        }
        var out_data = {
            data: money_out_data,
            color: '#444'
        }
        $.plot('#money_in_chart', [in_data], {
            grid: {
                hoverable: true,
                borderColor: '#000',
                borderWidth: 0,
                lineWidth: 1,
                tickColor: '#bbb',
                markings: [ { yaxis: { from: 0, to: 0 }, color: "rgba(97, 211, 149, 0.25)" }],
                markingsLineWidth: 1
            },
            series: {
                shadowSize: 0,
                lines: {
                    show: true,
                    lineWidth: 1
                },
                points: {
                    show: true
                }
            },
            lines: {
                fill: false
            },
            yaxis: {
                show: true,
                tickLength: 0
            },
            xaxis: {
                show: true,
                mode: "time",
                tickFormatter: function (v, axis) {
                    var d = new Date(v);
                    var today = new Date();
                    var t = today.getDate() + '/' + yearMonths[today.getMonth()] + '/' + today.getFullYear();
                    var c = d.getDate() + '/' + yearMonths[d.getMonth()] + '/' + d.getFullYear();

                    var timeDiff = Math.abs(today.getTime() - d.getTime());
                    var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24));

                    if(diffDays >  30) {
                        return '';
                    }

                    if(t == c) {
                        console.log(d, today);
                        return '<span>Today</span>';
                    } else {
                        //if(d.getDate() % 2 == 0) {
                            return d.getDate() + '/' + yearMonths[d.getMonth()];
                        // } else {
                        //     return '';
                        // }
                    }
                },
                tickLength: 0,
                autoscaleMargin: 0.0005
            }
        })
        $.plot('#money_out_chart', [out_data], {
            grid: {
                hoverable: true,
                borderColor: '#fff',
                borderWidth: 0,
                lineWidth: 1,
                tickColor: '#bbb',
                markings: [ { yaxis: { from: 0, to: 0 }, color: "rgba(68, 68, 68, 0.25)" }],
                markingsLineWidth: 1
            },
            series: {
                shadowSize: 0,
                lines: {
                    show: true,
                    lineWidth: 1
                },
                points: {
                    show: true
                }
            },
            lines: {
                fill: false
            },
            yaxis: {
                show: true,
                tickLength: 0
            },
            xaxis: {
                show: true,
                mode: "time",
                tickFormatter: function (v, axis) {
                    var d = new Date(v);
                    var today = new Date();
                    var t = today.getDate() + '/' + yearMonths[today.getMonth()] + '/' + today.getFullYear();
                    var c = d.getDate() + '/' + yearMonths[d.getMonth()] + '/' + d.getFullYear();

                    var timeDiff = Math.abs(today.getTime() - d.getTime());
                    var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24));

                    if(diffDays >  30) {
                        return '';
                    }

                    if(t == c) {
                        return '<span>Today</span>';
                    } else {
                        //if(d.getDate() % 2 == 0) {
                            return d.getDate() + '/' + yearMonths[d.getMonth()];
                        // } else {
                        //     return '';
                        // }
                    }
                },
                tickLength: 0,
                autoscaleMargin: 0.0005
            }
        })
        //Initialize tooltip on hover
        $('<div class="tooltip-inner" id="line-chart-tooltip"></div>').css({
            position: 'absolute',
            display: 'none',
            opacity: 0.8
        }).appendTo('body')
        $('#money_in_chart, #money_out_chart').bind('plothover', function (event, pos, item) {

            if (item) {
                var x = item.datapoint[0],
                    y = item.datapoint[1].toFixed(2);

                var dat = new Date(x);
                var real_date = dat.getDate() + ' ' + yearMonths[dat.getMonth()] + ', ' + dat.getFullYear();

                $('#line-chart-tooltip').html(real_date + '<br/><strong>' + $('#user_default_currency_code').val() + '</strong>' + myFormatNumber(y))
                    .css({
                        top: item.pageY - (($('#line-chart-tooltip').height()) + 40),
                        left: item.pageX - ($('#line-chart-tooltip').width() / 2) - 23
                    })
                    .fadeIn(200)
            } else {
                $('#line-chart-tooltip').hide()
            }

        })
    }
})