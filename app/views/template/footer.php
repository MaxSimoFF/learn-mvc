


    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.5.2/bootbox.min.js"></script>
    <script>
        $('.delete').click(function(){
            let id = $(this).data('id');
            bootbox.confirm("This is the default confirm!", function(result){
                if(result === true){
                    window.location.href = "/employee/delete/" + id;
                }
            });
            return false;
        });
    </script>
    </body>
</html>