function translate() {
    i18n.init({
        resGetPath:'./translate/fr.json',
        getAsync:false
    }).done(function(){
        $('[data-i18n]').i18n();
    });
}