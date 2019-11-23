@extends('layouts.site')

@section('title')
    {{ __('Polityka cookies') }}
@endsection

@section('description')
    {{ __('Polityka cookies') }}
@endsection

@section('breadcrumbs')
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            {!! Breadcrumbs::render('regulation') !!}
        </div>
    </div>	
</div>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong>
                        1. POSTANOWIENIA WSTĘPNE
                    </strong>
                </div>

                <div class="card-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <ol>
                                    <li>Serwis <a href="{{ route('homepage') }}">EmployMed.eu</a> działa na zasadach określonych w niniejszym Regulaminie. Każdy Użytkownik zobowiązany jest, z momentem podjęcia czynności zmierzających do korzystania z Usługi oferowanych przez <a href="{{ route('homepage') }}">EmployMed.eu</a> do przestrzegania postanowień niniejszego Regulaminu.</li>
                                    <li>Regulamin ma na celu zapewnienie niezakłóconego, zgodnego z prawem i uporządkowanego korzystania z Serwisu przez Użytkowników. Regulacje zawarte w Regulaminie służą̨ w szczególności zapewnieniu prywatności Użytkowników, ochronie gromadzonych i przetwarzanych danych osobowych.</li>
                                    <li>Przed rejestracją w Serwisie Użytkownik zobowiązany jest zapoznać się z treścią Regulaminu. Zarejestrowanie się Użytkownika w Serwisie jednoznaczne jest z zapoznaniem się i akceptacją przez Użytkownika treści niniejszego Regulaminu wraz z załącznikami oraz zawarciem Umowy o świadczenie usług drogą elektroniczną bez konieczności sporządzania odrębnej pisemnej umowy. Użytkownik zobowiązany jest przestrzegać postanowień Regulaminu od momentu rejestracji w Serwisie.</li>
                                    <li>W ramach Serwisu Usługodawca współpracuje z Pracodawcami udostepniającymi Kandydatom własne treści. Kandydaci mogą̨ skorzystać́ z usług świadczonych przez Pracodawców z zastrzeżeniem, że Usługodawca nie ponosi odpowiedzialności za czynności wykonywane przez Użytkowników poza Serwisem. Do usług świadczonych przez Usługodawcę stosuje się̨ postanowienia Regulaminu.</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong>
                        2. DEFINICJE
                    </strong>
                </div>

                <div class="card-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <ol>
                                    <li><strong>Aplikacja</strong> – oznacza ogół danych osobowych i informacji, przesyłanych przez Kandydata za pośrednictwem Serwisu, mogących obejmować między innymi: curriculum vitae (CV), list motywacyjny oraz dane osobowe Kandydata.</li>
                                    <li><strong>Cennik</strong> – oznacza szczegółowy wykaz cen dla Usług odpłatnych znajdujący się w Serwisie pod adresem: <a href="{{ route('homepage') }}">https://employmed.eu</a>.</li>
                                    <li><strong>Dane Niedozwolone</strong> – oznaczają treści zakazane przez obowiązujące przepisy prawa polskiego i międzynarodowego, w szczególności treści pornograficzne, treści związane z propagowaniem przemocy i nienawiści, treści drastyczne, a także treści powszechnie uznawane za obraźliwie, naganne moralnie, społecznie niewłaściwe, obrażające uczucia religijne, naruszające prawa autorskie lub prawa innych osób, których udostępnianie w ramach Serwisu jest niedozwolone.</li>
                                    <li><strong>Formularz rejestracyjny</strong> – oznacza formularz dostępny w Serwisie umożliwiający zarejestrowanie Konta przez Użytkownika.</li>
                                    <li><strong>Kandydat</strong> – oznacza osobę fizyczną, korzystająca z Serwisu w celu uzyskania kontaktu z potencjalnym Pracodawcą.</li>
                                    <li><strong>Kodeks Cywilny</strong> – oznacza ustawę z dnia 23 kwietnia 1964 r. - Kodeks Cywilny (Dz.U. z 2017 r. poz. 459 ze zm.).</li>
                                    <li><strong>Konto</strong> – oznacza dostępne dla Użytkowników po zalogowaniu (podaniu Loginu i hasła) miejsce w Serwisie, za pośrednictwem którego Użytkownicy wykonują działania i operacje związane z funkcjonowaniem w Serwisie.</li>
                                    <li><strong>Login</strong> – oznacza unikalny i niepowtarzalny identyfikator Użytkownika w Serwisie.</li>
                                    <li><strong>Ogłoszenie</strong> – oznacza kierowane przez Pracodawcę do Kandydatów, za pośrednictwem Serwisu, ogłoszenie o rekrutacji na określone stanowisko pracy, zamieszczone w Serwisie.</li>
                                    <li><strong>Pracodawca</strong> – oznacza osobę fizyczną albo osobę prawną, posiadająca pełną zdolność do czynności prawnych, korzystająca z Serwisu w ramach swojej aktywności gospodarczej lub zawodowej.</li>
                                    <li><strong>Pliki Cookie („ciasteczka”)</strong> – oznaczają pliki tekstowe zapisywane przez przeglądarkę internetową na dysku komputera lub na urządzeniu mobilnym Użytkownika w celu przechowywania informacji służących do identyfikowania Użytkownika bądź zapamiętywania historii działań podejmowanych przez niego w Serwisie.</li>
                                    <li><strong>Regulamin</strong> – oznacza niniejszy dokument będący regulaminem w rozumieniu Ustawy z dnia 18 lipca 2002 r. o świadczeniu usług drogą elektroniczną i określający zasady świadczenia Usług Elektronicznych przez Usługodawcę, w tym szczegółowe zasady funkcjonowania Serwisu .</li>
                                    <li><strong>Serwis</strong> – oznacza system informatyczny opracowany przez Usługodawcę składający się z serwisu internetowego zamieszczonego w domenie <a href="{{ route('homepage') }}">https://employmed.eu</a>, udostępniony drogą elektroniczną przez Usługodawcę, umożliwiający Użytkownikom korzystanie z Usług opisanych w Regulaminie.</li>
                                    <li><strong>Subskrypcja ogłoszeń</strong> – oznacza usługę świadczoną w Serwisie polegającą na cyklicznym informowaniu Kandydata o Ogłoszeniach, odpowiadających zdefiniowanym przez Kandydata kryteriom wyboru.</li>
                                    <li><strong>Usługi Elektroniczne</strong> – oznaczają usługi elektroniczne w rozumieniu Ustawy o Świadczeniu Usług Drogą Elektroniczną, świadczone na rzecz Użytkowników przez Usługodawcę z wykorzystaniem Serwisu, polegające w szczególności na utrzymywaniu Kont w Serwisie oraz umieszczaniu Ogłoszeń przez Pracodawców.</li>
                                    <li><strong>Ustawa o świadczeniu usług drogą elektroniczną</strong> – oznacza ustawę z dnia 18 lipca 2002 r. o świadczeniu usług drogą elektroniczną (tj. Dz.U. z 2017 r., poz. 1219).</li>
                                    <li><strong>Ustawa o prawie autorskim i prawach pokrewnych</strong> – oznacza ustawę z dnia 4 lipca 1994 r. o prawie autorskim i prawach pokrewnych (tj. Dz.U. z 2017 r., poz. 880).</li>
                                    <li><strong>RODO</strong> – oznacza Rozporządzenie Parlamentu Europejskiego i Rady (UE) 2016/679 z dnia 27 kwietnia 2016 r. w sprawie ochrony osób fizycznych w związku z przetwarzaniem danych osobowych i w sprawie swobodnego przepływu takich danych oraz uchylenia dyrektywy 95/46/WE (ogólne rozporządzenie o ochronie danych).</li>
                                    <li><strong>Ustawa o ochronie danych osobowych</strong> – oznacza ustawę z dnia 10 maja 2018 r. o ochronie danych osobowych.</li>
                                    <li><strong>Użytkownik</strong> – oznacza Kandydata, Pracodawcę korzystającego z Serwisu na podstawie Umowy zawartej z Usługodawcą.</li>
                                    <li>
                                        <strong>Usługa</strong> – oznacza usługi świadczone za pośrednictwem Serwisu polegające w szczególności na:
                                        <ul>
                                            <li>udostępnianiu informacji o Kandydatach,</li>
                                            <li>udostępnieniu informacji na temat Pracodawców, tj.:</li>
                                            <li>
                                                <ul>
                                                    <li>adresów, danych kontaktowych Pracodawców,</li>
                                                    <li>Ogłoszeń kierowanych do Użytkowników przez Pracodawców,</li>
                                                </ul>
                                            </li>
                                            <li>udostępnieniu możliwości wprowadzania do Serwisu przez Pracodawców wizytówek i ofert dotyczących ich działalności.</li>
                                        </ul>
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong>
                        3. ZASADY DOSTĘPU DO SERWISU ORAZ WYMAGANIA TECHNICZNE
                    </strong>
                </div>

                <div class="card-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <ol>
                                    <li>Celem korzystania z Usług Użytkownik powinien spełniać wskazane w niniejszym punkcie wymagania techniczne, niezbędne do współpracy z systemem teleinformatycznym Usługodawcy, którym posługuje się Użytkownik.</li>
                                    <li>Użytkownik powinien we własnym zakresie zapewnić urządzenie z dostępem do sieci Internet, wyposażone w przeglądarkę umożliwiającą wyświetlanie na ekranie urządzenia dokumentów HTML oraz aktywne konto poczty elektronicznej.</li>
                                    <li>W celu prawidłowego korzystania z Usług świadczonych w ramach Serwisu wymagana jest: przeglądarka Microsoft Internet Explorer w wersji 10.0 i wyższej, Google Chrome w wersji 13.0 lub wyższej, Opera w wersji 11.0 lub wyższej, Safari w wersji 5.0 lub wyższej bądź FireFox Mozilla 7.0.1 lub wyższej oraz włączenie w przeglądarce internetowej Użytkownika obsługi JavaScript oraz plików cookies.</li>
                                    <li>W Serwisie mogą zostać wykorzystane następujące technologie: PHP, JavaScript, cookies.</li>
                                    <li>Do utworzenia lub korzystania z Konta niezbędne jest posiadanie konta e-mail.</li>
                                    <li>Prawidłowe korzystanie z Usług możliwe jest jedynie po spełnieniu w/w wymagań technicznych. Usługodawca nie jest odpowiedzialny za nieprawidłowości w świadczeniu Usług powstałe w związku z niespełnieniem przez Użytkownika powyższych wymogów.</li>
                                    <li>Zgodnie z art. 6 ust. 1 Ustawy o świadczeniu usług drogą elektroniczną Usługodawca informuje Użytkownika, że korzystanie z Usług może wiązać się ze standardowym ryzykiem związanym z wykorzystaniem sieci Internet i rekomenduje przedsięwzięcie odpowiednich kroków w celu ich zminimalizowania.</li>
                                    <li>Użytkownik nie powinien używać komputerów oraz jakichkolwiek innych urządzeń pozwalających na korzystanie z Usług niezabezpieczonych przed dostępem osób niepowołanych.</li>
                                    <li>Użytkownik w procesach rejestracji, pierwszego logowania, logowania do Serwisu oraz procesie odzyskiwania hasła powinien upewnić się czy połączenie z Serwisem realizowane jest w bezpiecznym, szyfrowanym protokole – https://.</li>
                                    <li>Użytkownik nie powinien zapisywać swoich haseł do Serwisu ani udostępniać ich osobom nieupoważnionym.</li>
                                    <li>Jeżeli Użytkownik dostrzeże oznaki błędnego lub nietypowego funkcjonowania Serwisu, niezwłocznie powinien przerwać korzystanie z Serwisu i zgłosić problem Usługodawcy na adres e-mail: <a href="mailto:contactemploymed@gmail.com">contactemploymed@gmail.com</a>.</li>
                                    <li>Usługodawca nie ponosi odpowiedzialności za szkody wynikające z udostępniania przez Użytkownika osobom trzecim hasła i loginu służących do rejestracji i logowania Użytkownika w Serwisie.</li>
                                    <li>W ramach świadczenia Usług Usługodawca zastrzega możliwość wystąpienia przerw w zapewnieniu dostępności do Serwisu. Wynikłe przerwy mogą być spowodowane aktualizowaniem Serwisu, koniecznością konserwacji lub usunięciem ewentualnych nieprawidłowości w działaniu Serwisu. Usługodawca podejmuje wszelkie starania, aby terminy przerw były możliwie najmniej uciążliwe dla Użytkowników. Użytkownik oświadcza, że wyraża zgodę na przerwy w dostępie do Serwisu w celu jego aktualizowania, wykonania konserwacji lub usunięcia przez Usługodawcę ewentualnych nieprawidłowości oraz że nie będzie podnosić z tego tytułu jakichkolwiek roszczeń.</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong>
                        4. USŁUGI
                    </strong>
                </div>

                <div class="card-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <ol>
                                    <li>
                                        <a href="{{ route('homepage') }}">EmployMed.eu</a> świadczy usługi polegające na udostępnianiu Serwisu Pracodawcom w celu poszukiwania Kandydatów w procesie rekrutacji oraz udostępnianiu Serwisu Kandydatom w celu poszukiwania pracy.
                                    </li>
                                    <li>
                                        Usługi udostępniane są elektronicznie w Serwisie.
                                    </li>
                                    <li>
                                        Usługodawca zastrzega sobie możliwość zmiany w dowolnej chwili funkcjonalności Serwisu rozbudowując go o nowe funkcje i udogodnienia dla Użytkowników, jak i zmiany w istniejącej funkcjonalności. Usługodawca zastrzega sobie prawo do zmiany zakresu świadczonych Usług, w tym ich dodawania i usuwania. Zmiany w powyższym zakresie nie stanowią zmiany Regulaminu.
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong>
                        5. KORZYSTANIE Z USŁUGI PRZEZ UŻYTKOWNIKÓW
                    </strong>
                </div>

                <div class="card-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <ol>
                                    <li>Użytkownikiem Serwisu może być osoba fizyczna oraz osoba prawna, która po zaakceptowaniu postanowień Regulaminu, zrealizuje procedurę rejestracji w <a href="{{ route('homepage') }}">EmployMed.eu</a>, zakończoną skutecznym założeniem Konta.</li>
                                    <li>Procedura rejestracji i aktywacji Konta przebiega stopniowo za pośrednictwem skrzynki e-mail i strony <a href="{{ route('homepage') }}">EmployMed.eu</a> do czego konieczne są również działania Użytkownika opisane na każdym etapie procedury rejestracji, a także w dziale Pomocy – kontakt e-mail: <a href="mailto:contactemploymed@gmail.com">contactemploymed@gmail.com</a>.</li>
                                    <li>Pracodawca, podczas rejestracji może uzupełnić swoje Konto o dane firmowe.</li>
                                    <li>Osoba, która nie dokona ostatecznej aktywacji Konta zakładanego podczas rejestracji zgodnie z jej procedurą, może zostać pozbawiona możliwości skutecznego założenia Konta, a co za tym idzie profilu Użytkownika o danym Loginie (Nick) zarezerwowanym czasowo dla tej osoby w <a href="{{ route('homepage') }}">EmployMed.eu</a>, jeżeli ostateczna aktywacja Konta nie zostanie dokonana w momencie od otrzymania wiadomości e-mail z informacjami o kolejnych krokach niezbędnych do skutecznego założenia Konta.</li>
                                    <li>Jedna osoba może mieć tylko jedno Konto w <a href="{{ route('homepage') }}">EmployMed.eu</a>.</li>
                                    <li>Zakazane jest dostarczanie przez Użytkowników Danych niedozwolonych.
                                        W szczególności zabronione jest używanie słów wulgarnych, podawania treści niezgodnych
                                        z faktami, pomawianie, znieważanie, mowa nienawiści.</li>
                                    <li>W celu prawidłowego funkcjonowania Serwisu, dane wprowadzane przez Użytkownika powinny być zgodne z rzeczywistością.</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong>
                        6. WARUNKI ZAWIERANIA UMOWY O ŚWIADCZENIE USŁUG DROGĄ ELEKTRONICZNĄ Z UŻYTKOWNIKIEM
                    </strong>
                </div>

                <div class="card-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <ol>
                                    <li>Umowa o świadczenie Usług zostaje zawarta w momencie wyświetlenia pierwszego okna Serwisu poprzez wpisanie przez niezarejestrowanego Użytkownika w przeglądarce odpowiedniego adresu internetowego wybranych przez niego stron www zawierających treści udostępniane w ramach Serwisu lub skorzystanie przez niego z przekierowania do takich stron Serwisu, z zastrzeżeniem pkt 3 i 4 poniżej.</li>
                                    <li>Przed zawarciem Umowy Usługodawca udostępnia Użytkownikom nieodpłatnie Regulamin.</li>
                                    <li>Umowa o świadczenie Usług dotyczących udostępnienia Kandydatom oraz Pracodawcom profilu zostaje zawarta w momencie założenia Konta w Serwisie. Rozwiązanie umowy z Kandydatem/Studentem/Pracodawcą następuje z dniem usunięcia przez niego Konta w Serwisie oraz w sytuacjach opisanych w pkt XII Regulaminu.</li>
                                    <li>Szczegółowe zasady zawierania i rozwiązywania Umów pomiędzy Usługodawcą a odpowiednio Kandydatem, Pracodawcą, zostały określone w dalszej części Regulaminu.</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong>
                        7. OGÓLNE ZASADY KORZYSTANIA Z SERWISU
                    </strong>
                </div>

                <div class="card-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <ol>
                                    <li>Użytkownicy są zobowiązani do korzystania z Serwisu w sposób zgodny z obowiązującym prawem, Regulaminem, zasadami współżycia społecznego, w tym ogólnymi zasadami korzystania z sieci Internet.</li>
                                    <li>Użytkownik przed zarejestrowaniem się do Serwisu zobowiązany jest zapoznać się z Regulaminem i zaakceptować jego treść. Aby rozpocząć pracę w Serwisie, Użytkownik musi zarejestrować się zgodnie z poleceniami Serwisu.</li>
                                    <li>
                                        Użytkownicy są zobowiązani w szczególności do:
                                        <ul>
                                            <li>korzystania z Serwisu w sposób niezakłócający jego funkcjonowania,</li>
                                            <li>korzystania z Serwisu w sposób nieuciążliwy dla innych Użytkowników oraz Usługodawcy, z poszanowaniem dóbr osobistych osób trzecich (w tym prawa do prywatności) i wszelkich innych przysługującym im praw,</li>
                                            <li>korzystania z wszelkich informacji i materiałów udostępnionych za pośrednictwem Serwisu jedynie w zakresie dozwolonego użytku.</li>
                                        </ul>
                                    </li>
                                    <li>Użytkownicy są zobowiązani niezwłocznie powiadomić Usługodawcę o każdym przypadku naruszenia ich praw w związku z korzystaniem z Serwisu.</li>
                                    <li>Dostęp do Serwisu uzyskują Użytkownicy, którzy prawidłowo przeszli proces rejestracji w Serwisie, chyba że Regulamin stanowi inaczej.</li>
                                    <li>Podczas rejestracji do Serwisu Użytkownik wprowadza login i hasło. Zasady ustalania loginu i hasła określone zostały w Polityce Prywatności.</li>
                                    <li>
                                        Usługodawca zastrzega sobie prawo zaprzestania świadczenia Usług w trybie natychmiastowym, jeśli Użytkownik:
                                        <ul>
                                            <li>umyślnie narusza postanowienia Regulaminu,</li>
                                            <li>dopuszcza się działań zmierzających do naruszenia bezpieczeństwa danych znajdujących się w Serwisie lub podejmuje nieuprawnioną próbę dostępu do Serwisu,</li>
                                            <li>dokonuje czynności niezgodnych z prawem,</li>
                                            <li>działa na szkodę Usługodawcy,</li>
                                            <li>podał nieprawdziwe dane,</li>
                                            <li>utracił login lub hasło oraz nie skorzystał ze wskazanej przez Usługodawcy Serwisu procedury odzysku loginu lub hasła,</li>
                                            <li>wyraził sprzeciw na podpowierzenie danych osobowych (RODO art. 28.2).</li>
                                            <li>w innych szczególnie uzasadnionych wypadkach.</li>
                                        </ul>
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong>
                        8. OŚWIADCZENIA PRACODAWCY
                    </strong>
                </div>

                <div class="card-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <ol>
                                    <li>
                                        Pracodawca oświadcza i gwarantuje Usługodawcy, że:
                                        <ul>
                                            <li>prowadzi działalność gospodarczą lub zawodową zgodną z informacjami przedstawionymi w swoim profilu,</li>
                                            <li>przysługują mu wszelkie prawa do wszelkich znaków towarowych, logotypów oraz innych oznaczeń wykorzystywanych przez niego w ramach korzystania przez niego z Usługi, a wykorzystanie ich w ramach korzystania przez niego z Usługi nie stanowi naruszenia prawa, naruszenia praw osób trzecich ani dobrych obyczajów,</li>
                                            <li>prezentowane przez niego w Serwisie Ogłoszenia nie naruszają prawa, praw osób trzecich ani dobrych obyczajów.</li>
                                        </ul>
                                    </li>
                                    <li>Pracodawca ponosi pełną odpowiedzialność prawną za umieszczane przez siebie materiały i informacje w Serwisie.</li>
                                    <li>Na Pracodawcy ciąży obowiązek zabezpieczenia danych dostępowych do Panelu Pracodawcy w taki sposób, aby dostęp do panelu miały wyłącznie osoby upoważnione do podejmowania czynności związanych z realizacją Umowy.</li>
                                    <li>Pracodawca, zakładając Konto w Serwisie oświadcza, że wyraża zgodę na wykorzystywanie przez Usługodawcę umieszczonych przez niego materiałów informacyjnych i marketingowych oraz logo w celu promocji Serwisu.</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong>
                        9. KORZYSTANIE Z USŁUG PRZEZ PRACODAWCĘ
                    </strong>
                </div>

                <div class="card-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <ol>
                                    <li>Umożliwienie Pracodawcy prezentowania swojego profilu oraz Ogłoszeń w <a href="{{ route('homepage') }}">EmployMed.eu</a> polega na udostępnieniu Pracodawcy przy użyciu Konta (dostępnego za pośrednictwem Serwisu) narzędzi informatycznych, za pomocą których Pracodawca może prezentować swoje Ogłoszenia w <a href="{{ route('homepage') }}">EmployMed.eu</a> oraz przeglądać profile Kandydatów.</li>
                                    <li>
                                        W celu utworzenia Konta Pracodawcy (rejestracji Pracodawcy), Pracodawca:
                                        <ul>
                                            <li>
                                                wypełnia Formularz rejestracyjny podając dane osobowe: Imię, adres e-mail, hasło, ulicę, kod pocztowy, miasto, nazwę firmy, adres firmy, kod pocztowy firmy, miasto firmy, NIP
                                            </li>
                                            <li>
                                                akceptuje Regulamin;
                                            </li>
                                            <li>
                                                wyraża zgodę na przetwarzanie danych osobowych;
                                            </li>
                                            <li>
                                                wybiera opcję „zarejestruj”.
                                            </li>
                                        </ul>
                                    </li>
                                    <li>Usługodawcy przysługuje w każdym czasie uprawnienie do odmowy lub zaprzestania udostępniania Konta Pracodawcy bez podania przyczyny.</li>
                                    <li>
                                        Usługodawca świadczy Usługi na rzecz Pracodawcy, polegające na:
                                        <ul>
                                            <li>przekazywaniu dostępu do panelu Pracodawcy, w celu korzystania z niektórych Usług dla Pracodawców;</li>
                                            <li>umieszczaniu w Serwisie Ogłoszeń na zlecenie Pracodawcy;</li>
                                            <li>wyróżnianiu Ogłoszeń w określony sposób;</li>
                                            <li>udostępnieniu możliwości otrzymywania Aplikacji od Kandydatów;</li>
                                            <li>wstępnej selekcji Aplikacji zgodnie ze stopniem kwalifikacji Kandydatów;</li>
                                            <li>zarządzaniu procesami rekrutacji i Aplikacjami;</li>
                                        </ul>
                                        <ol>
                                            <li>Usługi świadczone są na podstawie Umowy zawartej w Serwisie albo poza nim.</li>
                                            <li>Termin do wykorzystania Usługi dla Pracodawcy jest zgodny z wybranym przez Pracodawcę abonamentem, chyba że Umowa wyraźnie stanowi inaczej.</li>
                                            <li>Jeżeli Umowa obejmuje zamieszczanie Ogłoszeń w Serwisie, należy przez to rozumieć gotowość Usługodawcy do zamieszczania Ogłoszeń w okresie obowiązywania Umowy. Ogłoszenia zostaną zamieszczone w Serwisie, jeżeli Pracodawca je wprowadzi oraz jeżeli spełnione będą inne warunki wynikające z Regulaminu.</li>
                                            <li>
                                                Pracodawca może wprowadzić Ogłoszenie:
                                                <ul>
                                                    <li>poprzez swoje Konto;</li>
                                                    <li>w inny sposób, uzgodniony przez Usługodawcę i Pracodawcę.</li>
                                                </ul>
                                            </li>
                                            <li>Usługodawca, przed rozpoczęciem wyświetlania Ogłoszenia w Serwisie, może sprawdzić zgodność jego treści z Umową oraz Regulaminem.</li>
                                            <li>Usługodawca może modyfikować treść Ogłoszenia w zakresie uzasadnionym koniecznością zapewnienia, aby treść Ogłoszenia i jego parametry były podane rzetelnie, zgodnie z prawem, w tym z Regulaminem, Umową, ze stanem faktycznym i nie wprowadzały Kandydatów w błąd.</li>
                                            <li>
                                                W przypadku powzięcia wiarygodnej informacji, że Ogłoszenie zawiera w swej treści Dane Niedozwolone lub jego zamieszczenie narusza Umowę albo Regulamin, Pracodawca zobowiązany jest do:
                                                <ul>
                                                    <li>usunięcia takiego Ogłoszenia z Serwisu lub</li>
                                                    <li>dostosowania sposobu jego prezentacji do wymogów Regulaminu.</li>
                                                </ul>
                                            </li>
                                            <li>Niezależnie od powyższego, Usługodawca może samodzielne dokonać zmiany treści Ogłoszenia, albo jego zablokowania/usunięcia z Serwisu. Ogłoszenie zablokowane nie będzie widoczne w Serwisie.</li>
                                            <li>Usunięcie albo zablokowanie Ogłoszenia nie stanowi podstawy do jakichkolwiek roszczeń względem Usługodawcy, a w szczególności nie uprawnia do żądania: odszkodowania, zwrotu wynagrodzenia uiszczonego za zamieszczenie Ogłoszenia lub powiększenia puli niewykorzystanych przez Pracodawcę Ogłoszeń.</li>
                                            <li>Czas, przez jaki Ogłoszenie jest wyświetlane w Serwisie, jako aktualne, ustalany jest każdorazowo przez Pracodawcę i wynosi 30 dni. Czas ten liczony jest od chwili opublikowania ogłoszenia.</li>
                                            <li>Po upływie czasu, przez jaki Ogłoszenie miało być wyświetlane przez 30 dni jako aktualne, Ogłoszenie znika z listy aktulanych ogłoszeń.</li>
                                            <li>Pracodawca może usunąć Ogłoszenie, przed upływem terminu, o którym mowa w ust. 16 powyżej.</li>
                                            <li>Oznaczenie Ogłoszenia jako usuniętego oznacza wyłączenie możliwości złożenia przez Kandydatów Aplikacji na Ogłoszenie.</li>
                                            <li>Wprowadzenie Ogłoszenia jest jednoznaczne z udzieleniem przez Pracodawcę nieodpłatnego prawa do korzystania przez Usługodawcę ze składających się na to Ogłoszenie elementów (w tym logo, treści ogłoszenia, szaty graficznej) w celu wyświetlania w Serwisie, umieszczania w publikacjach drukowanych oraz materiałach reklamowych, bez ograniczeń terytorialnych, na okres 5 lat. Po upływie wskazanego w zdaniu poprzednim okresu prawo to przysługuje na czas nieokreślony z trzymiesięcznym okresem wypowiedzenia Umowy przez Pracodawcę.</li>
                                            <li>Prawo, o którym mowa w ust. 21 powyżej, obejmuje także prawo do modyfikacji Ogłoszenia w granicach zmian redakcyjnych i korzystania ze zmodyfikowanego Ogłoszenia w takim samym zakresie jak określony w ust. 21.</li>
                                            <li>Zamieszczenie Ogłoszenia jest równoznaczne z wyrażeniem zgody na publikację Ogłoszenia również na innych stronach internetowych Usługodawcy oraz u współpracujących z nim partnerów przez okres opisany w ust. 21.</li>
                                        </ol>
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong>
                        10. KORZYSTANIE Z USŁUG PRZEZ KANYDYDATÓW
                    </strong>
                </div>

                <div class="card-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <ol>
                                    <li>
                                        Kandydat przy użyciu Konta (dostępnego za pośrednictwem Serwisu) oraz narzędzi informatycznych może przesyłać Aplikacje Pracodawcom.
                                    </li>
                                    <li>
                                        Usługodawca świadczy na rzecz Kandydata Usługi polegające na udostępnianiu Serwisu w celu poszukiwania pracy.
                                    </li>
                                    <li>
                                        Usługa założenia Konta w Serwisie dla Kandydata jest bezpłatna.
                                    </li>
                                    <li>
                                        W celu utworzenia Konta Kandydata (rejestracji Kandydata), Kandydat:
                                        <ul>
                                            W celu utworzenia Konta Kandydata (rejestracji Kandydata), Kandydat:
                                            <li>wypełnia Formularz rejestracyjny podając dane osobowe: pwz, data urodzenia, adres e-mail, Hasło, płeć, imię, specjalizację, specjalizację (w trakcie);</li>
                                            <li>akceptuje Regulamin;</li>
                                            <li>wyraża zgodę na przetwarzanie danych osobowych;</li>
                                            <li>wybiera opcję „zarejestruj”.</li>
                                        </ul>
                                    </li>
                                    <li>Pod przyciskiem „zarejestruj” Kandydat zapoznaje się z informacją, że skuteczne zakończenie procesu rejestracji oznacza zawarcie Umowy z Usługodawcą.</li>
                                    <li>Kandydat zobowiązany jest nie ujawniać osobie trzeciej hasła i ponosi wyłączną odpowiedzialność za szkody wyrządzone na skutek takiego ujawnienia.</li>
                                    <li>Na adres e-mail podany podczas rejestracji Usługodawca przesyła wiadomość e-mail z linkiem aktywacyjnym, zawierającą informacje o Administratorze i inne wymagane przez art. 13 RODO oraz informację, że dane osobowe podane do rejestracji są przetwarzane w celu zawarcia Umowy do czasu kliknięcia przez Kandydata w link aktywacyjny, a po kliknięciu w link, w celu wykonywania Umowy oraz w celu prawnie uzasadnionych interesów Administratora. Po kliknięciu w link aktywacyjny następuje zarejestrowanie Kandydata w Serwisie i zawarcie Umowy.</li>
                                    <li>
                                        Umowa z Kandydatem obejmuje:
                                        <ul>
                                            <li>prowadzenie aktywnego Konta Kandydata;</li>
                                            <li>przekazywanie informacji o Kandydacie do Pracodawcy, w tym CV;</li>
                                            <li>przechowywanie informacji o Kandydacie celem poszukiwania dla niego ofert pracy;</li>
                                            <li>powiadamianie o ofertach pracy – subskrypcja ofert pracy.</li>
                                        </ul>
                                    </li>
                                    <li>
                                        Po utworzeniu Konta Kandydat może poprzez wpisanie wybranych danych dotyczących edukacji, przebiegu kariery zawodowej itp. utworzyć profil.
                                    </li>
                                    <li>Kandydat może dokonać Aplikacji na konkretne Ogłoszenie poprzez załączenie plików CV.</li>
                                    <li>Aby zaaplikować Kandydat musi wypełnić formularz znajdujący się na dole strony każdego ogłoszenia.</li>
                                    <li>Dopuszczalne dokumenty przesłane w ramach Serwisy: format MS Word, PDF, wielkość dokumentu do 2 MB, język dokumentów: dowolny, dokumenty elektroniczne sprawdzone programem antywirusowym i możliwe do otwarcia.</li>
                                    <li>Po wysłaniu Aplikacji Kandydat otrzymuje wpis w zakładce "Lista wiadomości", dzięki któremu może dalej komunikować się z pracodawcą.</li>
                                    <li>Usługodawcy przysługuje w każdym czasie uprawnienie do odmowy lub zaprzestania udostępniania dowolnego kanału informatycznego Kandydatowi w przypadku naruszenia przez niego treści Regulaminu.</li>
                                    <li>
                                        Konto Kandydata usuwa się z Serwisu, w przypadku, gdy:
                                        <ul>
                                            <li>adres e-mail podany w Formularzu rejestracyjnym uniemożliwia kontakt z Kandydatem;</li>
                                            <li>występuje brak aktywności Kandydata przez okres 12 miesięcy od rejestracji;</li>
                                            <li>Kandydat narusza istotne postanowienia Regulaminu.</li>
                                        </ul>
                                    </li>
                                    <li>
                                        Jeżeli jakakolwiek treść/Aplikacja Kandydata lub sposób jego prezentacji w ramach Usługi narusza postanowienia Regulaminu, Kandydat zobowiązany jest do:
                                        <ul>
                                            <li>usunięcia takiego wpisu lub</li>
                                            <li>dostosowania sposobu jego prezentacji do wymogów Regulaminu.</li>
                                        </ul>
                                    </li>
                                    <li>
                                        Kandydat korzystając z Serwisu oświadcza, że przysługują mu wszelkie prawa do wszelkich znaków towarowych, logotypów oraz innych oznaczeń wykorzystywanych przez niego w ramach korzystania przez niego z Usługi, a wykorzystanie ich w ramach korzystania przez niego z Usługi nie stanowi naruszenia prawa, naruszenia praw osób trzecich ani dobrych obyczajów.
                                    </li>
                                    <li>Kandydat ponosi pełną odpowiedzialność prawną za umieszczane przez siebie materiały i informacje w Serwisie.</li>
                                    <li>Kandydat zakładając Konto w Serwisie oświadcza, że wyraża zgodę na nieodpłatne wykorzystywanie przez Usługodawcę umieszczonych przez niego materiałów w celu promocji Serwisu.</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong>
                        11. ZAKOŃCZENIE KORZYSTANIA Z SERWISU
                    </strong>
                </div>

                <div class="card-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <ol>
                                    <li>
                                        Użytkownicy mogą w dowolnym czasie zaprzestać korzystania z Serwisu, w szczególności wówczas, gdy nie zaakceptują zmian wprowadzonych w niniejszym Regulaminie, Polityce Prywatności lub modyfikacji Serwisu.
                                    </li>
                                    <li>W przypadku stwierdzenia, że Użytkownik dopuszcza się działań zabronionych prawem lub Regulaminem, albo naruszających zasady współżycia społecznego lub godzących w usprawiedliwiony interes Usługodawcy, a w szczególności jego dobre imię, Usługodawca może podjąć wszelkie prawem dozwolone działania, w tym ograniczyć możliwość korzystania przez Użytkownika z Serwisu i świadczonych za jego pośrednictwem Usług.</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong>
                        12. ODPOWIEDZIALNOŚĆ
                    </strong>
                </div>

                <div class="card-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <ol>
                                    <li>
                                        Usługodawca prowadzi bieżący nadzór nad technicznym funkcjonowaniem Serwisu, zapewniając poprawność jego działania.
                                    </li>
                                    <li>
                                        Usługodawca nie ponosi odpowiedzialności za:
                                        <ul>
                                            <li>poprawność i aktualność danych zawartych w bazach danych Pracodawców oraz za ich wybór lub przydatność do konkretnych celów,</li>
                                            <li>decyzje lub działania jakie Użytkownik podejmie na podstawie danych zawartych
                                                w <a href="{{ route('homepage') }}">EmployMed.eu</a> oraz za ich wybór lub przydatność do konkretnych celów,</li>
                                            <li>
                                                niewłaściwe i nie zawinione przez Usługodawcę działanie mechanizmów <a href="{{ route('homepage') }}">EmployMed.eu</a>,
                                            </li>
                                            <li>
                                                zawartość Ogłoszeń udostępnianych przez Pracodawców w Serwisie,
                                            </li>
                                            <li>
                                                wszelkie szkody wynikłe ze sposobu, w jaki Użytkownicy korzystają z <a href="{{ route('homepage') }}">EmployMed.eu</a>, o ile takie działania Użytkowników nie stanowią normalnego korzystania
                                                z <a href="{{ route('homepage') }}">EmployMed.eu</a> zgodnie z jego przeznaczeniem,
                                            </li>
                                            <li>
                                                treści udostępniane przez Użytkownika w wyniku korzystania z Usług, które to treści naruszają przepisy prawa lub chronione prawem dobra osób trzecich (w tym utwory w rozumieniu Ustawy o prawie autorskim i prawach pokrewnych),
                                            </li>
                                            <li>
                                                upublicznienie w Serwisie swojego wizerunku przez Użytkownika;
                                            </li>
                                            <li>
                                                brak autentyczności informacji i danych podawanych przez Użytkowników
                                                w <a href="{{ route('homepage') }}">EmployMed.eu</a> lub informacji o Użytkownikach udostępnianych innym Użytkownikom,
                                            </li>
                                            <li>skutki wynikłe z wejścia w posiadanie przez osoby trzecie hasła dostępowego Użytkownika, o ile nastąpiło to z winy Użytkownika,</li>
                                            <li>udostępnienie hasła i danych osobom upoważnionym na podstawie właściwych przepisów prawa,</li>
                                            <li>informacje pobrane przez Użytkownika z Internetu oraz za skutki ich wykorzystania przez Użytkownika,</li>
                                            <li>szkody powstałe w wyniku działania siły wyższej,</li>
                                            <li>szkody będące skutkiem naruszania przez Użytkowników praw osób trzecich,</li>
                                            <li>usługi, aplikacje i serwisy internetowe, których dostawcą są osoby trzecie,</li>
                                            <li>treści przekazywane i publikowane na łamach <a href="{{ route('homepage') }}">EmployMed.eu</a> przez Użytkowników,
                                                za ich prawdziwość, rzetelność oraz ich autentyczność.</li>
                                        </ul>
                                    </li>
                                    <li>Usługodawca nie ponosi odpowiedzialności za ograniczenia lub problemy techniczne
                                        w systemach teleinformatycznych, z których korzystają urządzenia Użytkowników, a które uniemożliwiają lub ograniczają Użytkownikom korzystanie z Serwisu
                                        i oferowanych za jego pośrednictwem Usług.</li>
                                    <li>Usługodawca nie ponosi wobec Użytkownika odpowiedzialności za szkody związane z zawarciem lub niewykonaniem lub nienależytym wykonaniem Umowy pomiędzy Pracodawcą a Kandydatem.</li>
                                    <li>Usługodawca nie ponosi także odpowiedzialności za szkody poniesione przez Użytkownika spowodowane zagrożeniami występującymi w sieci Internet, a w szczególności włamaniami do systemu Użytkownika, przejęciami haseł przez osoby trzecie, zainfekowaniem systemu Użytkownika wirusami.</li>
                                    <li>Każda strona Umowy zobowiązana jest do naprawienia szkody jaką druga strona poniosła wskutek niewykonania lub nienależytego wykonania Umowy, chyba że niewykonanie lub nienależyte wykonanie było następstwem okoliczności, za które strona nie ponosi odpowiedzialności, w szczególności na skutek działania siły wyższej.</li>
                                    <li>Żadna ze stron nie odpowiada wobec drugiej strony za utracone korzyści.</li>
                                    <li>Odpowiedzialność Usługodawcy za szkodę wyrządzoną Pracodawcy ograniczona jest do wysokości wynagrodzenia uiszczonego przez Pracodawcę.</li>
                                    <li>Wobec Użytkownika naruszającego Regulamin Usługodawca nie ponosi odpowiedzialności za jakiekolwiek szkody powstałe na skutek zaprzestania świadczenia Usług/rozwiązania Umowy, w tym na skutek usunięcia Konta.</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong>
                        13. REKLAMACJE
                    </strong>
                </div>

                <div class="card-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <ol>
                                    <li>
                                        Usługodawca zastrzega sobie prawo dokonywania czynności konserwacyjnych, naprawczych oraz związanych z modyfikacją i rozwojem funkcjonalności <a href="{{ route('homepage') }}">EmployMed.eu</a>. W miarę możliwości Usługodawca wykonywać będzie te prace w godzinach nocnych tj. pomiędzy godz. 24:00 a 6:00 rano. Usługodawca dokłada wszelkich starań w celu powiadamiania Użytkowników o planowanych czynnościach konserwacyjnych, naprawczych oraz związanych z modyfikacją i rozwojem funkcjonalności.
                                    </li>
                                    <li>Zakłócenia w funkcjonowaniu <a href="{{ route('homepage') }}">EmployMed.eu</a> mogą być reklamowane przez Użytkownika poprzez zgłaszanie dysfunkcji Usługodawcy za pośrednictwem poczty email, wysyłając wiadomość na adres <a href="contactemploymed@gmail.com">contactemploymed@gmail.com</a>. W celu usprawnienia udzielenia przez Usługodawcę odpowiedzi na reklamację powinna ona zawierać w swojej treści dokładny opis i powód reklamacji.</li>
                                    <li>W terminie 14 dni roboczych od dnia jej otrzymania Usługodawca rozpatruje reklamację oraz informuje Użytkownika, za pomocą poczty elektronicznej, o sposobie jej rozpatrzenia. W sytuacji, gdy podane w reklamacji dane lub informacje wymagają uzupełnienia Usługodawca zwraca się przed rozpatrzeniem reklamacji do Użytkownika o jej uzupełnienie. Czas udzielania dodatkowych wyjaśnień przez Użytkownika przedłuża okres rozpatrywania reklamacji.</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong>
                        14. AUTORSKIE PRAWA MAJĄTKOWE
                    </strong>
                </div>

                <div class="card-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <ol>
                                    <li>Serwis oraz wszelkie zawarte w nim materiały i informacje, a w szczególności teksty, rozwiązania nawigacyjne, wybór i układ prezentowych w ramach Serwisu treści, logotypy, elementy graficzne, znaki towarowe należą do Usługodawcy. Prawa autorskie związane
                                        z <a href="{{ route('homepage') }}">EmployMed.eu</a> podlegają ochronie Ustawy o prawie autorskim i prawach pokrewnych z dnia 4 lutego 1994 r. (Dz.U. z 2018 r. poz. 1191)</li>
                                    <li>Zabronione jest wykorzystywanie przez Użytkowników jakichkolwiek elementów graficznych stanowiących przedmiot praw przysługujących Usługodawcy, za wyjątkiem banerów promujących <a href="{{ route('homepage') }}">EmployMed.eu</a> oraz sytuacji wyraźnie wskazanych w Regulaminie lub za zgodą Usługodawcy.</li>
                                    <li>Użytkownik przyjmuje do wiadomości, iż wszelkie działania skutkujące lub mające na celu naruszenie warunków korzystania z <a href="{{ route('homepage') }}">EmployMed.eu</a> określonych w niniejszym Regulaminie, stanowią naruszenie prawa oraz postanowień niniejszego Regulaminu.</li>
                                    <li>Użytkownik, który zamieszcza w Serwisie treści, stanowiące utwór w rozumieniu Ustawy
                                        o prawie autorskim i prawach pokrewnych oświadcza, że przysługują mu autorskie prawa do tego utworu. Jednocześnie, z chwilą zamieszczenia utworu w Serwisie Użytkownik udziela Usługodawcy nieodpłatnej, niewyłącznej oraz nieograniczonej terytorialnie, ograniczonej czasowo do okresu świadczenia Usług na rzecz Użytkownika licencji, zezwalającej
                                        na korzystanie z utworu na polach eksploatacji: wytwarzanie, zwielokrotnianie, publiczne odtworzenie i wyświetlanie, wprowadzenie do pamięci komputera i serwera, umieszczanie w sieci Internet.</li>
                                    <li>W przypadku, gdy Użytkownik zamieszcza w Serwisie swój wizerunek, tym samym wyraża on zgodę na jego nieodpłatne utrwalanie, zwielokrotnianie i rozpowszechnianie przez Usługodawcę w okresie świadczenia Usług, na polach eksploatacji określonych w ust. 4 powyżej – zgodnie z art. 81 Ustawy o prawie autorskim i prawach pokrewnych. Usługodawca oświadcza, że zamieszczony przez Użytkownika wizerunek będzie wykorzystywany w celu prawidłowego wykonania Usług.</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong>
                        15. OCHRONA DANYCH OSOBOWYCH
                    </strong>
                </div>

                <div class="card-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <ol>
                                    <li>
                                        Administratorem danych osobowych dotyczących Użytkowników jest Usługodawca, tj. Michał Biernat. Administrator niniejszym udostępnia dane kontaktowe: adres poczty elektronicznej <a href="contactemploymed@gmail.com">contactemploymed@gmail.com</a>.
                                    </li>
                                    <li>Administrator podejmuje wszelkie działania niezbędne do ochrony danych Użytkownika oraz wszelkich innych danych wprowadzonych przez Użytkownika do Serwisu.</li>
                                    <li>Administrator nie odpowiada za treść danych wprowadzanych przez Użytkownika do Serwisu.</li>
                                    <li>Dane osobowe zbierane i przetwarzane są w celu wykonania Umowy między Usługodawcą,
                                        a Kandydatem, Pracodawcą, na podstawie art. 6 ust. 1 lit. b RODO. Dane osobowe zbierane i przetwarzane są także na podstawie art. 6 ust. 1 lit. f RODO (prawnie uzasadnione interesy) w celu marketingu bezpośredniego Usług Usługodawcy, a także przechowywane
                                        w celu dochodzenia roszczeń (prawnie uzasadniony interes Administratora).</li>
                                    <li>Dane osobowe przetwarzane są do zakończenia Umowy, a następnie przechowywane,
                                        do upływu okresu przedawnienia roszczeń z Umowy.</li>
                                    <li>Użytkownik ma prawo żądać dostępu do swoich danych osobowych, ich sprostowania, usunięcia, ograniczenia przetwarzania, wniesienia sprzeciwu wobec przetwarzania, a także
                                        do przenoszenia danych. Jednakże wykonanie niektórych żądań, tj. usunięcie, wniesienie sprzeciwu, przeniesienie danych uniemożliwia wykonanie Umowy i powoduje jej rozwiązanie.</li>
                                    <li>Użytkownik ma prawo do wniesienia skargi do organu nadzorczego.</li>
                                    <li>Żądania w zakresie przetwarzania danych osobowych należy zgłaszać na adres e-mail podany w ust.1 powyżej.</li>
                                    <li>Dane osobowe przetwarzane są w sposób niezautomatyzowany. Nie dokonuje się profilowania.</li>
                                    <li>Administrator opracował i wdrożył Politykę bezpieczeństwa danych osobowych zgodną z RODO.</li>
                                    <li>W celu skorzystania z prawa domagania się zmiany, poprawienia lub usunięcia danych
                                        z <a href="{{ route('homepage') }}">EmployMed.eu</a> Użytkownik powinien przesłać do Usługodawcy pocztą elektroniczną stosowne żądanie wraz z podaniem imienia i nazwiska Użytkownika.</li>
                                    <li>W momencie rozwiązania Umowy, wszelkie dane wprowadzone przez Użytkownika zostają usunięte z Serwisu.</li>
                                    <li>Pytania i wszelkie wnioski dotyczące ochrony prywatności należy kierować na adres e-mail: <a href="contactemploymed@gmail.com">contactemploymed@gmail.com</a>.</li>
                                    <li>Zasady przetwarzania danych osobowych Użytkowników Serwisu, tj. w szczególności sposób gromadzenia i wykorzystywania informacji, które ich dotyczą, a także uprawnienia Użytkowników Serwisu w odniesieniu do dotyczących ich danych osobowych określa Polityka Prywatności Serwisu stanowiąca Załącznik nr 1 do Regulaminu.</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong>
                        16. POSTANOWIENIA KOŃCOWE
                    </strong>
                </div>

                <div class="card-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <ol>
                                   <li>Usługodawca nie ponosi odpowiedzialności, w szczególności karnej, cywilnej
                                        i administracyjnej, za korzystanie przez Użytkownika z <a href="{{ route('homepage') }}">EmployMed.eu</a> w sposób sprzeczny
                                        z postanowieniami niniejszego Regulaminu.</li>
                                    <li>Użytkownik jest zobowiązany do zapoznania się z treścią niniejszego Regulaminu i każdorazowo związany jest jego postanowieniami w chwili korzystania z <a href="{{ route('homepage') }}">EmployMed.eu</a>.</li>
                                    <li>Regulamin jest udostępniony nieodpłatnie wszystkim Użytkownikom Serwisu, którzy mogą go pobrać, odtworzyć i utrwalić za pośrednictwem Serwisu.</li>
                                    <li>Wszelkie uwagi, komentarze i pytania związane z <a href="{{ route('homepage') }}">EmployMed.eu</a> należy kierować na adres: <a href="contactemploymed@gmail.com">contactemploymed@gmail.com</a></li>
                                    <li>Wszelkie informacje o naruszeniach przez Użytkowników postanowień niniejszego Regulaminu należy kierować na adres: <a href="contactemploymed@gmail.com">contactemploymed@gmail.com</a></li>
                                    <li>Regulamin podlega prawu polskiemu.</li>
                                    <li>Jeżeli którekolwiek postanowienie Regulaminu zostanie uznane na mocy prawomocnego orzeczenia sądu za nieważne, pozostałe postanowienia Regulaminu pozostają w mocy.</li>
                                    <li>W sprawach nieuregulowanych w Regulaminie zastosowanie znajdują przepisy ustawy
                                    o świadczeniu usług drogą elektroniczną, ustawy o ochronie danych osobowych, kodeksu cywilnego, ustawy o prawie autorskim i prawach pokrewnych, a także innych odpowiednich regulacji prawnych.</li>
                                    <li>Wszelkie spory mogące się wyłonić na tle realizacji Regulaminu lub Umowy rozstrzygane będą przez Sąd właściwy dla siedziby Usługodawcy. W przypadku Użytkowników niebędących Konsumentami, wszelkie spory związane z realizacją Umowy będą rozstrzygane przez sąd właściwy dla miejsca siedziby Konsumenta.</li>
                                    <li>Użytkownik będący Konsumentem posiada możliwości skorzystania z pozasądowych sposobów rozpatrywania reklamacji i dochodzenia roszczeń względem Usługodawcy. Może m.in. zwrócić się o udzielenie bezpłatnej pomocy prawnej do miejskiego (powiatowego) rzecznika praw konsumentów lub organizacji społecznej, do której zadań statutowych należy ochrona konsumentów (np. do Federacji Konsumentów). Bezpłatny numer kontaktowy do Federacji Konsumentów to +48 800 007 707.</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong>
                        17. ZMIANY REGULAMINU
                    </strong>
                </div>

                <div class="card-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <ol>
                                    <li>Usługodawca zastrzega sobie prawo do dokonywania zmian w niniejszym Regulaminie
                                        w każdym czasie, o ile jest to spowodowane wymogami technicznymi Serwisu czy zmianami przepisów prawa, zaś zmiany obowiązują wszystkich nowych użytkowników, korzystających
                                        z Serwisu od dnia dokonania zmiany. W przypadku dotychczasowych użytkowników Serwisu, zmiany wprowadzone do Regulaminu obowiązują ich po 14 dniach kalendarzowych od daty wprowadzenia zmiany i poinformowania (to jest od daty ich opublikowania na stronie <a href="{{ route('homepage') }}">EmployMed.eu</a>). W przypadku nie akceptowania zapisów Regulaminu Użytkownicy są zobowiązani do nie korzystania z Serwisu <a href="{{ route('homepage') }}">EmployMed.eu</a>.</li>
                                    <li>O wszelkich zmianach Regulaminu Użytkownicy będą informowani elektronicznie na adres e-mail podany przy rejestracji.</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
@endsection