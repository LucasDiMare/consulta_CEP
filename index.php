
                                    
                                    <div class="col-md-3 mb-3">
                                        <label for="cep">CEP</label>
                                        <input type="text" class="form-control" name="cep" id="cep" placeholder="Digite o CEP" required>
                                        <div class="invalid-feedback">
                                        Informe um CEP válido.
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="address">Endereço</label>
                                        <input type="text" class="form-control" name="address" id="address" placeholder="Endereço">
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="district">Bairro</label>
                                        <input type="text" class="form-control" name="district" id="district" placeholder="Bairro">
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="city">Cidade</label>
                                        <input type="text" class="form-control" name="city" id="city" placeholder="Cidade">
                                    </div>
                                    <div class="col-md-1 mb-3">
                                        <label for="state">Estado</label>
                                        <input type="text" class="form-control" name="state" id="state" placeholder="Estado">
                                    </div>
                                    <div class="col-md-1 mb-3">
                                        <label for="home_num">Numero</label>
                                        <input type="number" class="form-control" name="state" id="state" placeholder="123">
                                    </div>

                                    <script>
                                        document.getElementById('cep').addEventListener('blur', function() {
                                        var cep = this.value.replace(/\D/g, '');
                                        if (cep != "") {
                                        var validacep = /^[0-9]{8}$/;
                                        if (validacep.test(cep)) {
                                            fetch('https://viacep.com.br/ws/' + cep + '/json/')
                                            .then(response => response.json())
                                            .then(data => {
                                                if (data.hasOwnProperty('erro')) {
                                                // CEP não encontrado
                                                document.getElementById('address').value = "";
                                                document.getElementById('district').value = "";
                                                document.getElementById('city').value = "";
                                                document.getElementById('state').value = "";
                                                document.getElementById('cep').classList.add('is-invalid');
                                                } else {
                                                // Preenche os campos com os dados do CEP encontrado
                                                document.getElementById('address').value = data.logradouro;
                                                document.getElementById('district').value = data.bairro;
                                                document.getElementById('city').value = data.localidade;
                                                document.getElementById('state').value = data.uf;
                                                document.getElementById('cep').classList.remove('is-invalid');
                                                }
                                            })
                                            .catch(error => console.log(error));
                                            } else {
                                                // CEP inválido
                                                document.getElementById('address').value = "";
                                                document.getElementById('district').value = "";
                                                document.getElementById('city').value = "";
                                                document.getElementById('state').value = "";
                                                document.getElementById('cep').classList.add('is-invalid');
                                            }
                                        } else {
                                            // CEP em branco
                                            document.getElementById('address').value = "";
                                            document.getElementById('district').value = "";
                                            document.getElementById('city').value = "";
                                            ocument.getElementById('state').value = "";
                                            document.getElementById('cep').classList.remove('is-invalid');
                                        }
                                    });
                                </script>
                                </div>
                                </div>
                                <a href="{{route('patients')}}" class="btn btn-default">Voltar</a>
                                <button class="btn btn-primary" type="submit">Salvar</button>
                                
                            </form>