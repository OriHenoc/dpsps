'use strict';
$(document).ready(function() {

    /*Area chart*/

        var chart = AmCharts.makeChart("statestics-chart", {
            "type": "serial",
            "marginTop": 0,
            "hideCredits": true,
            "marginRight": 0,
            "dataProvider": [
                {
                "year": "Janvier",
                "value": 88
                }, 
                {
                "year": "Février",
                "value": 76
                }, 
                {
                "year": "Mars",
                "value": 85
                }, 
                {
                "year": "Avril",
                "value": 63
                }, 
                {
                "year": "Mai",
                "value": 52
                }, 
                {
                "year": "Juin",
                "value": 35
                }, 
                {
                "year": "Juillet",
                "value": 72           
                }, 
                {
                "year": "Août",
                "value": 84
                }, 
                {
                "year": "Septembre",
                "value": 76            
                },
                {
                "year": "Octobre",
                "value": 49            
                },
                {
                "year": "Novembre",
                "value": 83           
                },
                {
                "year": "Décembre",
                "value": 94            
                }
            ],
            "valueAxes": [{
                "axisAlpha": 0,
                "dashLength": 100,
                "gridAlpha": 0.1,
                "position": "left"
            }],
            "graphs": [{
                "id": "g1",
                "bullet": "round",
                "bulletSize": 9,
                "lineColor": "#4680ff",
                "lineThickness": 2,
                "negativeLineColor": "#4680ff",
                "type": "smoothedLine",
                "valueField": "value"
            }],
            "chartCursor": {
                "cursorAlpha": 0,
                "valueLineEnabled": false,
                "valueLineBalloonEnabled": true,
                "valueLineAlpha": false,
                "color": '#fff',
                "cursorColor": '#FC6180',
                "fullWidth": true
            },
            "categoryField": "year",
            "categoryAxis": {
                "gridAlpha": 0,
                "axisAlpha": 0,
                "fillAlpha": 1,
                "fillColor": "#FAFAFA",
                "minorGridAlpha": 0,
                "minorGridEnabled": true
            },
            "export": {
                "enabled": true
            }
        });
        /*donut chart*/

});