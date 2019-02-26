$(()=>{
    $('.select2_multiple').SumoSelect({
        placeholder: '请选择选项',
        selectAll: true,
        search: true,
        okCancelInMulti: true,
        locale: ['确定','取消','全选'],
    });

    $('.tags_input').tagsInput({
        width:'auto',
        defaultText: '回车键确定'
    });

    $("input.flat").iCheck({
        checkboxClass: "icheckbox_flat-green",
        radioClass: "iradio_flat-green"
    });


    /**
     * data-type: 'time'/'date'/'datetime'   指定类型
     * data-range: 'true'/'~'   指定时间段分隔符
     */
    layui.use('laydate', function(){
        var laydate = layui.laydate;

        $('.layer-datetime').each(function(index,el){
            var range = false,type='datetime';
            if ( el.dataset.range ) {
                range = el.dataset.range;
                if ( range == 'true' ) range='~';
            }
            if ( el.dataset.type ) {
                type = el.dataset.type;
            }
            laydate.render({
                elem: el,
                type: type,     //
                range: range   // 或 range: '~' 来自定义分割字符
            });
        });

    });

    // 图片上传预览
    $('.picture-preview-input').on('change',function(event){
        var windowURL = window.URL || window.webkitURL;
        var img = windowURL.createObjectURL($(this)[0].files[0]);
        $(this).siblings('.picture-preview').css({backgroundImage:'url('+img+')'})
    });

// custom.js框架已经初始化
//var a = Array.prototype.slice.call(document.querySelectorAll(".js-switch"));
//a.forEach(function(a) {
//    new Switchery(a, {
    //   color: "#26B99A"
//    })
//})

    // 图表
    $('.chart_plots').each((index,li)=>{
        var arr_data = $(li).data('data');
        var options = {
            series: {
                /*bars: {   // 是否展示条形图
                  show: true,
                  barWidth: 0.6,
                  align: "center"
                },*/
                lines: {
                    show: false,
                    fill: true
                },
                splines: {
                    // 图表平滑化
                    show: true,
                    tension: 0.4,
                    lineWidth: 2,
                    fill: 0.4
                },
                points: {
                    radius: 1,
                    show: true
                },
                shadowSize: 2
            },
            grid: {
                verticalLines: true,
                hoverable: true,
                clickable: true,
                tickColor: "#d5d5d5",
                borderWidth: 1,
                color: '#fff'
            },
            colors: ["rgba(38, 185, 154, 0.38)", "rgba(3, 88, 106, 0.38)"],
            xaxis: {
                tickColor: "rgba(51, 51, 51, 0.06)",
                mode: "categories",
                //tickSize: [1, "day"],
                tickLength: 10,
                labelWidth: 50,
                axisLabel: "日期",
                axisLabelUseCanvas: true,
                axisLabelFontSizePixels: 12,
                axisLabelFontFamily: 'Verdana, Arial',
                axisLabelPadding: 10
            },
            yaxis: {
                ticks: 8, // 列数据量8+1 = 9个
                tickColor: "rgba(51, 51, 51, 0.06)",
            },
            tooltip: true
        };

        $(li).plot([{data:arr_data}],options);
    });;



    // view 查看页面 禁止重新输入
    $('.index-view input,.index-view textarea,.index-view select').prop('disabled',true);
});

