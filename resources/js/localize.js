import en from 'vee-validate/dist/locale/en.json';
import de from 'vee-validate/dist/locale/de.json';
import uk from 'vee-validate/dist/locale/uk.json';
import pl from 'vee-validate/dist/locale/pl.json';

var userLang = navigator.language || navigator.userLanguage;

if(String(Laravel.Locale) === 'ukr' || userLang === 'uk')
{
    localize(
        'uk', uk
    );
} else if(String(Laravel.Locale) === 'pl'|| userLang === 'pl-PL') {
    localize(
        'pl', pl
    );
} else if(String(Laravel.Locale) === 'en' || userLang === 'en' || userLang === 'en-GB') {
    localize(
        'en', en
    );
} else if(String(Laravel.Locale) === 'de' || userLang === 'de') {
    localize(
        'de', de
    );
}