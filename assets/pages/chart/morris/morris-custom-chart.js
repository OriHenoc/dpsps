"use strict";
$(document).ready(function() {

    lineChart();
    donutChart();

    $(window).on('resize',function() {
        window.lineChart.redraw();
        window.donutChart.redraw();
    });
});

/*Line chart*/
function lineChart() {
    window.lineChart = Morris.Line({
        element: 'dossiersAnnees',
        data: [
            { annee: '2014', nb: 100 },
            { annee: '2015', nb: 75 },
            { annee: '2016', nb: 50 },
            { annee: '2017', nb: 95 },
            { annee: '2018', nb: 70 },
            { annee: '2019', nb: 94 },
            { annee: '2020', nb: 40 }
        ],
        xkey: 'annee',
        redraw: true,
        ykeys: ['nb'],
        hideHover: 'auto',
        labels: ['Dossiers'],
        lineColors: ['#FF9F55']
    });
}

/*Donut chart*/
function donutChart() {
    window.areaChart = Morris.Donut({
        element: 'rapportsDossiers',
        redraw: true,
        data: [
            { label: "En cours", value: 10 },
            { label: "Terminés", value: 50 },
        ],
        colors: ['#5FBEAA', '#34495E']
    });
}

// Morris bar chart
Morris.Bar({
    element: 'activitesMois',
    data: [{
        mois: 'Octobre',
        nbr: 100
        }, 
        {
        mois: 'Novembre',
        nbr: 75
        }, 
        {
        mois: 'Décembre',
        nbr: 48
        }, 
        {
        mois: 'Janvier',
        nbr: 62
        }],

    xkey: 'mois',
    ykeys: ['nbr'],
    labels: ['Activités'],
    barColors: ['#5D9CEC'],
    hideHover: 'auto',
    gridLineColor: '#eef0f2',
    resize: true 
});