
    </div>
    </div>

    <script src="../js/app.js"></script>

    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../js/demo/chart-area-demo.js"></script>
    <script src="../js/demo/chart-pie-demo.js"></script>

    <!-- Page level plugins -->
    <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../js/demo/datatables-demo.js"></script>
    <script type="text/javascript">
        $('#btn-salvar-perfil').click(function(event){
            event.preventDefault();
            
            $.ajax({
                url:"editar-perfil.php",
                method:"post",
                data: $('form').serialize(),
                dataType: "text",
                success: function(msg){
                if(msg.trim() === 'Salvo com Sucesso!'){
                                            
                        $('#btn-fechar-perfil').click();
                        window.location='index.php';

                        }
                    else{
                        $('#mensagem-perfil').addClass('text-danger')
                        $('#mensagem-perfil').text(msg);
                    

                    }
                }
            })
        })
    </script>




    <script type="text/javascript">
        $('#btn-salvar-email').click(function(event){
            event.preventDefault();
            $('#mensagem-email-marketing').addClass('text-info')
            $('#mensagem-email-marketing').removeClass('text-danger')
            $('#mensagem-email-marketing').removeClass('text-success')
            $('#mensagem-email-marketing').text('Enviando')
            $.ajax({
                url:"email-marketing.php",
                method:"post",
                data: $('form').serialize(),
                dataType: "text",
                success: function(msg){
                if(msg.trim() === 'Enviado com Sucesso!'){
                        $('#mensagem-email-marketing').removeClass('text-info')
                        $('#mensagem-email-marketing').addClass('text-success')
                        $('#mensagem-email-marketing').text(msg);
                        $('#assunto-email').val('');
                        $('#link-email').val('');
                        $('#mensagem-email').val('');
                        

                    }else if(msg.trim() === 'Preencha o Campo Assunto!'){
                        
                        $('#mensagem-email-marketing').addClass('text-danger')
                        $('#mensagem-email-marketing').text(msg);
                    

                    }else if(msg.trim() === 'Preencha o Campo Mensagem!'){
                        
                        $('#mensagem-email-marketing').addClass('text-danger')
                        $('#mensagem-email-marketing').text(msg);
                    

                    
                    }

                    else{
                        $('#mensagem-email-marketing').addClass('text-danger')
                        $('#mensagem-email-marketing').text('Deu erro ao Enviar o Formulário! Provavelmente seu servidor de hospedagem não está com permissão de envio habilitada ou você está em um servidor local!');
                        //$('#div-mensagem').text(msg);

                    }
                }
            })
        })
    </script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>

    <script src="../../js/mascara.js"></script>
    </body>
</html>