document.entityApi = {
    "iterators": {
        "fields": 0
    }
};

function getId(id) {
    return document.getElementById(id);
}

function insertElement(id, element) {
    getId(id).insertAdjacentHTML("beforeend",element);
}

function formElement(type) {
    var iterator = document.entityApi.iterators.fields;
    var string = "<li>";
    string += "<ul>" +
        "  <input type='hidden' name='field_type_" + iterator + "' value='" + type + "'>" +
        "  <li>" +
        "    <label for='field_title_" + iterator + "'>title</label>" +
        "    <input type='text' name='field_title_" + iterator + "' id='field_title_" + iterator + "'>" +
        "  </li>" +
        "  <li>" +
        "    <label for='field_nullable_" + iterator + "'>Nullable</label>" +
        "    <input type='checkbox' name='field_nullable_" + iterator + "' id='field_nullable_" + iterator + "' value='1'>" +
        "  </li>" +
        "  <li>" +
        "    <label for='field_unique_" + iterator + "'>Unique</label>" +
        "    <input type='checkbox' name='field_unique_" + iterator + "' id='field_unique_" + iterator + "' value='1'>" +
        "  </li>";
    switch (type) {
        case "string":
            string += "  <li>" +
                "    <label for='field_lengt_" + iterator + "'>Length</label>" +
                "    <input type='text' name='field_length_" + iterator + "' id='field_length_" + iterator + "'>" +
                "  </li>";
            break;
        case "decimal":
            string += "  <li>" +
                "    <label for='field_precision_" + iterator + "'>Precision</label>" +
                "    <input type='text' name='field_precision_" + iterator +"' id='field_precision_" + iterator + "'>" +
                "  </li>" +
                "  <li>" +
                "    <label for='field_scale_" + iterator + "'>Scale</label>" +
                "    <input type='text' name='field_scale_" + iterator + "' id='field_scale_" + iterator + "'>" +
                "  </li>";
            break;
        default:
            break;
    }
    string += "</ul>";
    string += "</li>";
    return string;
}

getId("add_field").addEventListener("click", function(){
    var type = getId("field_type").value;
    if (type !== "0") {
        var element = formElement(type);
        insertElement("fields",element);
    }
    document.entityApi.iterators.fields++;
});