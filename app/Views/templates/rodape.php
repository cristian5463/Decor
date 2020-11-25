    
    </div>
    <!-- JavaScript -->
    <script src="/js/jquery.min.js"></script>
    <script src="/js/popper.js"></script>
    <script src="/js/bootstrap.js"></script>
    <script src="/js/jquery.mask.min.js"></script>
    <script src="/js/toastr.min.js"></script>
    <script src="/js/all.js"></script>

    <script type="text/javascript">
        //Função para confirmar ação
        function confirmar(mensagem) {
            var confirmar = confirm(mensagem);
            if (confirmar) {
                return true;
            } else {
                return false;
            }
        }

        $(function() {
            // esconde valor promocional
            $('#valor_promocional_campo').hide();
            //
            $('.moeda').mask("#.##0,00", {
                reverse: true
            });
            $('.cpf').mask("000.000.000-00");
            $('.cep').mask("00000-000");
            // Função para verificar status do checkbox do valor promocional
            $("#e_promocional").on("change", function() {
                var input_e_promocional = $(this).prop("checked");
                //
                if (input_e_promocional) {
                    $('#valor_promocional_campo').slideDown('fast');
                } else {
                    $('#valor_promocional_campo').slideUp('fast');
                }
            });
            <?php if (isset($e_promocional) && $e_promocional == 1) :  ?>
                $('#valor_promocional_campo').slideDown('fast');
            <?php endif  ?>

            //função para localizar dados de cep
            function cep(cep) {
                $.ajax({
                    url: 'https://viacep.com.br/ws/' + cep + '/json',
                    dataType: 'jsonp',
                    crossDomain: true,
                    contentType: 'application/json'
                }).done(function(data) {
                    if (data['logradouro']) {
                        $("#endereco").val(data.logradouro);
                        $("#complemento").val(data.complemento);
                        $("#bairro").val(data.bairro);
                        $("#cidade").val(data.localidade);
                        $("#estado").val(data.uf);
                        //Vamos incluir para que o Número seja focado automaticamente
                        $("#numero").focus();
                    } else {
                        toastr.error('CEP não encontrado...', 'Atenção', {
                            timeOut: 3000,
                            progressBar: true,
                            preventDuplicates: true,
                            positionClass: "toast-bot-right"
                        });
                    }
                });
            }
            $('.cep').blur(function() {
                cep($(this).val());
            });

            <?php

            if (session('mensagem')) : ?>

                toastr.success('<?= session("mensagem") ?>', 'Sucesso', {
                    timeOut: 5000,
                    progressBar: true,
                    preventDuplicates: true,
                    positionClass: "toast-top-right"
                });
            <?php endif; ?>
        });


        var dropdown = document.getElementsByClassName("dropdown-btn");
        var i;

        for (i = 0; i < dropdown.length; i++) {
            dropdown[i].addEventListener("click", function() {
                this.classList.toggle("active");
                var dropdownContent = this.nextElementSibling;
                if (dropdownContent.style.display === "block") {
                    dropdownContent.style.display = "none";
                } else {
                    dropdownContent.style.display = "block";
                }
            });
        }
    </script>
    </body>

    </html>