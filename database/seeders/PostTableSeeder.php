<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            'title' => "Co nowego w PHP 8.1",
            'slug' => "co-nowego-w-php-8.1",
            'content' => "<p>W zeszłym tygodniu pojawiła się nowa aktualizacja PHP &mdash; wersja 8.1, kt&oacute;ra będzie utrzymywana do 2024 r.
                            Miło się zaskoczyłam, ponieważ poza klasycznym naprawieniem błęd&oacute;w i poprawieniem stabilności kodu pojawiły się całkiem nowe i przydatne feautere&rsquo;y.</p>
                            <p>Przykładem niech będzie m.in.&nbsp; długo wyczekiwany enum czy typ bezzwrotny, o czym napiszemy więcej p&oacute;źniej.<br />
                            Dzięki wprowadzonym funkcjom Twoja strona www zyska na operatywności. Przejdźmy wsp&oacute;lnie przez najciekawsze zmiany:</p>",
            'user_id' => 1,
            'category_id' => 1,
            'is_published' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('posts')->insert([
            'title' => 'Wprowadzenie do Bootstrap 5',
            'slug' => 'wprowadzenie-do-bootstrap-5',
            'content' => '<p>Bootstrap 5 został wydany jako ostateczna wersja publiczna.
                        Zasadniczo oznacza to, że powinieneś przygotować się na migrację z poprzedniej wersji i używać nowej wersji do tworzenia nowych stron internetowych.
                        Niezależnie od tego, czy przeprowadzasz migrację, czy uruchamiasz nową witrynę, powinieneś najpierw nauczyć się podstawowego szablonu lub szablonu startowego.<br />
                        W tym samouczku wyjaśnie, jak na prostych przykładach stworzyć podstawowy szablon startowy
                        &nbsp;<a href="https://www.webnots.com/bootstrap-tutorials/" target="_blank">Bootstrap 5</a>&nbsp;do uruchamiania projekt&oacute;w.</p>',
            'user_id' => 3,
            'category_id' => 6,
            'is_published' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('posts')->insert([
            'title' => 'Jak zainstalować Vue w Laravel 8',
            'slug' => 'jak-zainstalować-vue-w-laravel-8',
            'content' => 'Jak zainstalować Vue w Laravel 8',
            'user_id' => 3,
            'category_id' => 2,
            'is_published' => 0,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('posts')->insert([
            'title' => 'Jaka jest przyszłość Jquery',
            'slug' => 'jaka-jest-przyszłość-jquery',
            'content' => 'Jaka jest przyszłość Jquery',
            'user_id' => 2,
            'category_id' => 4,
            'is_published' => 0,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

//        DB::table('posts')->insert([
//            'title' => 'Jak zainstalować Laravel',
//            'slug' => 'jak-zainstalować-laravel',
//            'content' => '<p>Najprostszą metodą instalacji będzie wykorzystanie Composera.
//                            To proste narzędzie do zarządzania pakietami PHP, a jego instalacja nie powinna sprawić nikomu kłopotu.
//                            Szczeg&oacute;łowe informacje znajdują się w&nbsp;<a href="https://getcomposer.org/doc/00-intro.md">dokumentacji</a>.</p>
//                            <p>Korzystając z Composera pobieramy instalację Laravela wpisując:</p>
//                            <blockquote>
//                            <p>composer global require laravel/installer</p>
//                            </blockquote>
//                            <p>Po zainstalowaniu Laravela komenda&nbsp;<em>laravel new</em>&nbsp;stworzy nową instalację we wskazanej lokalizacji.
//                            Dla przykładu komenda&nbsp;<em>laravel new blog</em>&nbsp;utworzy katalog o nazwie blog zawierający świeżą i gotową do działania instalację.</p>
//                            <h3><strong>Instalacja Laravela jako projekt</strong></h3>
//                            <p>Drugą metodą jest instalacja Laravela tworząc od razu nowy projekt.
//                            W tym celu w Composerze wpisujemy komendę, kt&oacute;ra stworzy nowy katalog o nazwie blog zawierający niezbędne do działania aplikacji pliki.
//                            Komenda do Composera to:</p>
//                            <blockquote>
//                            <p>composer create-project &ndash;prefer-dist laravel/laravel blog</p>
//                            </blockquote>
//                            <h3>Artisan&nbsp;</h3>
//                            <p>Ostatnim krokiem będzie skorzystanie z CLI Laravela, kt&oacute;re udostępnia cały szereg przydatnych komend potrzebnych podczas programowania.
//                            Poniższa komenda uruchamia wbudowany w PHP serwer:</p>
//                            <blockquote>
//                            <p>php artisan serve</p>
//                            </blockquote>
//                            <p>Po jej wpisaniu aplikacja zaczyna działać, a efekty zobaczysz wchodzą na adres http://localhost:8000</p>
//                            <h2><strong>Podsumowanie</strong></h2>
//                            <p>Instalacja Laravela jest prosta i nie powinna sprawić nikomu trudności.
//                           </p>',
//            'user_id' => 2,
//            'category_id' => 2,
//            'is_published' => 1,
//            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
//            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
//        ]);

    }
}
