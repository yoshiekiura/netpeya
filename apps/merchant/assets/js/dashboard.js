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

                    console.log(money_in_data);

                    if(total_money_in > 0) {
                        $('.graphs-container').removeClass('hidden');
                        $('#no-transaction-holder').addClass('hidden');
                    } else {
                        $('#no-transaction-holder').removeClass('hidden');
                        $('.graphs-container').addClass('hidden');
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
            color: '#82d2a6'
        }
        var out_data = {
            data: money_out_data,
            color: '#000'
        }
        $.plot('#sales_chart', [in_data], {
            grid: {
                hoverable: true,
                borderColor: '#bbb',
                borderWidth: 0,
                lineWidth: 1,
                tickColor: '#bbb',
                markingsLineWidth: 1,
            },
            series: {
                shadowSize: 0,
                lines: {
                    show: true,
                    lineWidth: 2
                },
                points: {
                    show: true,
                    fill:true,
                    radius: 4,
                    fillColor: "#fff",
                }
            },
            lines: {
                fill: true
            },
            yaxis: {
                show: true,
                tickLength: 0
            },
            xaxis: {
                show: true,
                mode: "time",
                tickLength: 0
            }
        })
        //Initialize tooltip on hover
        $('<div class="tooltip-inner" id="line-chart-tooltip"></div>').css({
            position: 'absolute',
            display: 'none',
            opacity: 0.8
        }).appendTo('body')
        $('#sales_chart').bind('plothover', function (event, pos, item) {

            if (item) {
                var x = item.datapoint[0],
                    y = item.datapoint[1].toFixed(2).toString();

                var dat = new Date(x);
                var real_date = dat.getDate() + ' ' + yearMonths[dat.getMonth()] + ', ' + dat.getFullYear();

                $('#line-chart-tooltip').html(real_date + '<br/><strong>' + $('#user_default_currency_code').val() + '</strong>' + myFormatNumber(y.replace("-", "")))
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