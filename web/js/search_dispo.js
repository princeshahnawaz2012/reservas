$(function(){

    $("#search_dispo_fecha_entrada").datepicker({
        dateFormat: 'dd/mm/yy',
        minDate: 0,
		monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
		dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sa']
    });
    $("#search_dispo_fecha_salida").datepicker({
        dateFormat: 'dd/mm/yy',
		
        minDate: 0,
        defaultDate: +1,
		monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
		dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sa']
    });   
    $("#search_pro_fecha_entrada").datepicker({
        dateFormat: 'dd/mm/yy',
        minDate: 0,
		monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
		dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sa']
    });
    $("#search_pro_fecha_salida").datepicker({
        dateFormat: 'dd/mm/yy',

        minDate: 0,
        defaultDate: +1,
		monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
		dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sa']
    });
});