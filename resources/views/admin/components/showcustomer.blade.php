<div class="modal fade" id="showCustomer" tabindex="-1" role="dialog" aria-labelledby="editCustomerLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editCustomerLabel">Cliente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form name="editFormCustomer" id="editFormCustomer" method=" POST">
                    @csrf
                    <input type="hidden" id="customerId" name="customerId">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-6">
                                <label for="name" class="col-form-label">Nombre: </label>
                                <input readonly="true" type="text" class="form-control" id="scustomerName" name="name">
                            </div>
                            <div class="col-6">
                                <label for="birth_date" class="col-form-label">Fecha de nacimiento:</label>
                                <input readonly="true" type="date" class="form-control" id="sbirth_dateCustomer"
                                    name="birth_date">
                            </div>
                        </div>

                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-6">
                                <label for="curp" class="col-form-label">CURP:</label>
                                <input readonly="true" type="text" class="form-control" id="scurpCustomer" name="curp">
                            </div>
                            <div class="col-6">
                                <label for="rfc" class="col-form-label">RFC:</label>
                                <input readonly="true" type="text" class="form-control" id="srfcCustomer" name="rfc">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Dirección</label>
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <label for="street" class="col-form-label">Calle:</label>
                                <input readonly="true" type="text" class="form-control" id="sstreetCustomer"
                                    name="street">
                            </div>
                            <div class="col-12 col-md-2">
                                <label for="in" class="col-form-label">N° Int:</label>
                                <input readonly="true" type="number" class="form-control" id="sinCustomer" name="in">
                            </div>
                            <div class="col-12 col-md-2">
                                <label for="en" class="col-form-label">N° Ext:</label>
                                <input readonly="true" type="number" class="form-control" id="senCustomer" name="en">
                            </div>
                            <div class="col-12 col-md-2">
                                <label for="CP" class="col-form-label">CP:</label>
                                <input readonly="true" type="text" class="form-control" id="scpCustomer" name="cp">
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-12 col-md-4">
                                <label for="in" class="col-form-label">Colonia</label>
                                <input readonly="true" type="text" class="form-control" id="ssuburbCustomer"
                                    name="suburb">
                            </div>
                            <div class="col-12 col-md-4">
                                <label for="city" class="col-form-label">Ciudad</label>
                                <input readonly="true" type="text" class="form-control" id="scityCustomer" name="city">
                            </div>
                            <div class="col-12 col-md-4">
                                <label for="state" class="col-form-label">Estado:</label>
                                <select readonly="true" class="form-control" id="sstateCustomer" name="state">
                                    <option value="no">Seleccione uno...</option>
                                    <option value="Aguascalientes">Aguascalientes</option>
                                    <option value="Baja California">Baja California</option>
                                    <option value="Baja California Sur">Baja California Sur</option>
                                    <option value="Campeche">Campeche</option>
                                    <option value="Chiapas">Chiapas</option>
                                    <option value="Chihuahua">Chihuahua</option>
                                    <option value="Coahuila">Coahuila</option>
                                    <option value="Colima">Colima</option>
                                    <option value="Distrito Federal">Distrito Federal</option>
                                    <option value="Durango">Durango</option>
                                    <option value="Estado de México">Estado de México</option>
                                    <option value="Guanajuato">Guanajuato</option>
                                    <option value="Guerrero">Guerrero</option>
                                    <option value="Hidalgo">Hidalgo</option>
                                    <option value="Jalisco">Jalisco</option>
                                    <option value="Michoacán">Michoacán</option>
                                    <option value="Morelos">Morelos</option>
                                    <option value="Nayarit">Nayarit</option>
                                    <option value="Nuevo León">Nuevo León</option>
                                    <option value="Oaxaca">Oaxaca</option>
                                    <option value="Puebla">Puebla</option>
                                    <option value="Querétaro">Querétaro</option>
                                    <option value="Quintana Roo">Quintana Roo</option>
                                    <option value="San Luis Potosí">San Luis Potosí</option>
                                    <option value="Sinaloa">Sinaloa</option>
                                    <option value="Sonora">Sonora</option>
                                    <option value="Tabasco">Tabasco</option>
                                    <option value="Tamaulipas">Tamaulipas</option>
                                    <option value="Tlaxcala">Tlaxcala</option>
                                    <option value="Veracruz">Veracruz</option>
                                    <option value="Yucatán">Yucatán</option>
                                    <option value="Zacatecas">Zacatecas</option>
                                </select>
                            </div>
                            <div class="col-12 col-md-4">
                                <label for="country" class="col-form-label">Pais</label>
                                <input readonly="true" type="text" class="form-control" id="scountryCustomer"
                                    name="country">
                            </div>
                            <div class="col-12 col-md-4">
                                <label for="desctription" class="col-form-label">N° de cliente:</label>
                                <input readonly="true" type="text" class="form-control" id="sdescriptionCustomer"
                                    name="desctription">
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="status" value="EN">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                {{--  <button type="submit" form="editFormCustomer" class="btn btn-primary">Guardar</button>  --}}
            </div>
        </div>
    </div>
</div>
