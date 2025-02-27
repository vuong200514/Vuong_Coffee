Chart.defaults.global.defaultFontFamily =
    '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = "#292b2c";

$(window).on("load", function () {
    $.ajax({
        url: "/api/chart/sales_chart",
        method: "GET",
        dataType: "json",
        success: function (response) {
            console.log(response);

            let begin = new Date(response["one_week_ago"]);
            let end = new Date(response["now"]);

            let weekly_sale_date = [];
            let weekly_sale_data = [];
            let day_iterate = new Date(begin);

            while (day_iterate <= end) {
                let formattedDate = day_iterate.toISOString().split("T")[0];
                let sales_total = response["data"][formattedDate] || 0;

                console.log(`Date: ${formattedDate}, Sales Total: ${sales_total}`);

                let month = day_iterate.toLocaleString("default", { month: "short" });
                let date = day_iterate.getDate();
                weekly_sale_date.push(`${month} ${date}`);
                weekly_sale_data.push(sales_total);

                day_iterate.setDate(day_iterate.getDate() + 1);
            }

            var ctx = document.getElementById("sales_chart").getContext("2d");

            var gradient = ctx.createLinearGradient(0, 0, 0, 400);
            gradient.addColorStop(0, "rgba(2,117,216,0.2)");
            gradient.addColorStop(1, "rgba(2,117,216,0)");

            new Chart(ctx, {
                type: "line",
                data: {
                    labels: weekly_sale_date,
                    datasets: [
                        {
                            label: "VNĐ",
                            lineTension: 0.3,
                            backgroundColor: gradient,
                            borderColor: "rgba(2,117,216,1)",
                            pointRadius: 5,
                            pointBackgroundColor: "rgba(2,117,216,1)",
                            pointBorderColor: "rgba(255,255,255,0.8)",
                            pointHoverRadius: 5,
                            pointHoverBackgroundColor: "rgba(2,117,216,1)",
                            pointHitRadius: 50,
                            pointBorderWidth: 2,
                            data: weekly_sale_data,
                        },
                    ],
                },
                options: {
                    scales: {
                        xAxes: [
                            {
                                time: { unit: "date" },
                                gridLines: { display: false },
                                ticks: { maxTicksLimit: 7 },
                            },
                        ],
                        yAxes: [
                            {
                                ticks: {
                                    min: 0,
                                    max: Math.max.apply(Math, weekly_sale_data) * 1.2,
                                    maxTicksLimit: 8,
                                },
                                gridLines: { color: "rgba(0, 0, 0, .125)" },
                            },
                        ],
                    },
                    legend: { display: false },
                    tooltips: {
                        callbacks: {
                            label: function (tooltipItem, data) {
                                return (
                                    data.datasets[tooltipItem.datasetIndex].label +
                                    ": " +
                                    tooltipItem.yLabel.toLocaleString("vi-VN", {
                                        style: "currency",
                                        currency: "VND",
                                    })
                                );
                            },
                        },
                    },
                    animation: {
                        duration: 2000,
                        easing: "easeInOutQuart",
                    },
                },
            });
        },
    });
});