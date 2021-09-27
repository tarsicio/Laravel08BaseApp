var indexedDB = window.indexedDB || window.mozIndexedDB || window.webkitIndexedDB || window.msIndexedDB;
dataBase = indexedDB.open("horus_venezuela", "1");
dataBase.onupgradeneeded = function (e) {
    active = dataBase.result;
    users = active.createObjectStore("users", { keyPath : 'id', autoIncrement : true });
    users.createIndex('idx_rols_id', 'rols_id', { unique : false });
    users.createIndex('idx_name', 'name', { unique : false });
    users.createIndex('idx_avatar', 'avatar', { unique : false });
    users.createIndex('idx_email', 'email', { unique : true });
    users.createIndex('idx_password', 'password', { unique : false });
    users.createIndex('idx_activo', 'activo', { unique : false });
    users.createIndex('idx_init_day', 'init_day', { unique : false });
    users.createIndex('idx_end_day', 'end_day', { unique : false });
            
    dataBase.onsuccess = function (e) {        
        swal('IndexdDB', 'Base de datos cargada correctamente.', 'success');
        loadUser();       
    };
        
    dataBase.onerror = function (e)  {        
        swal('IndexdDB', 'Error cargando la base de datos.', 'error');
    };
}

function loadUser() {
    var active = dataBase.result;
    var data = active.transaction(["users"], "readonly");
    var users = data.objectStore("users");

    var elements = [];

    users.openCursor().onsuccess = function (e) {
        var result = e.target.result;
            if (result === null) {
                return;
            }
        elements.push(result.value);
        result.continue();
    };

    data.oncomplete = function () {
        var outerHTML = '';
        for (var key in elements) {
            outerHTML += '\n\
            <tr>\n\
            <td>' + elements[key].name + '</td>\n\
            <td>' + elements[key].email + '</td>\n\
            <td>\n\
            <button type="button" onclick="load(' + elements[key].id + ')">Details</button>\n\
            </td>\n\
            </tr>';
        }
        elements = [];
        //document.querySelector("#elementsList").innerHTML = outerHTML;
    };

}
