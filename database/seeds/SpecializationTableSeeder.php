<?php

use App\Specialization;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SpecializationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Specialization::create(['name' => 'Alergologia', 'slug' => Str::slug('Alergologia')]);
        Specialization::create(['name' => 'Anestezjologia i intensywna terapia', 'slug' => Str::slug('Anestezjologia i intensywna terapia')]);
        Specialization::create(['name' => 'Angiologia', 'slug' => Str::slug('Angiologia')]);
        Specialization::create(['name' => 'Audiologia i foniatria', 'slug' => Str::slug('Audiologia i foniatria')]);
        Specialization::create(['name' => 'Balneologia i medycyna fizykalna', 'slug' => Str::slug('Balneologia i medycyna fizykalna')]);
        Specialization::create(['name' => 'Chirurgia dziecięca', 'slug' => Str::slug('Chirurgia dziecięca')]);
        Specialization::create(['name' => 'Chirurgia klatki piersiowej', 'slug' => Str::slug('Chirurgia klatki piersiowej')]);
        Specialization::create(['name' => 'Chirurgia naczyniowa', 'slug' => Str::slug('Chirurgia naczyniowa')]);
        Specialization::create(['name' => 'Chirurgia ogólna', 'slug' => Str::slug('Chirurgia ogólna')]);
        Specialization::create(['name' => 'Chirurgia onkologiczna', 'slug' => Str::slug('Chirurgia onkologiczna')]);
        Specialization::create(['name' => 'Chirurgia plastyczna', 'slug' => Str::slug('Chirurgia plastyczna')]);
        Specialization::create(['name' => 'Choroby płuc', 'slug' => Str::slug('Choroby płuc')]);
        Specialization::create(['name' => 'Choroby płuc dzieci', 'slug' => Str::slug('Choroby płuc dzieci')]);
        Specialization::create(['name' => 'Choroby wewnętrzne', 'slug' => Str::slug('Choroby wewnętrzne')]);
        Specialization::create(['name' => 'Choroby zakaźne', 'slug' => Str::slug('Choroby zakaźne')]);
        Specialization::create(['name' => 'Dermatologia i wenerologia', 'slug' => Str::slug('Dermatologia i wenerologia')]);
        Specialization::create(['name' => 'Diabetologia', 'slug' => Str::slug('Diabetologia')]);
        Specialization::create(['name' => 'Diagnostyka laboratoryjna', 'slug' => Str::slug('Diagnostyka laboratoryjna')]);
        Specialization::create(['name' => 'Endokrynologia', 'slug' => Str::slug('Endokrynologia')]);
        Specialization::create(['name' => 'Endokrynologia ginekologiczna i rozrodczość', 'slug' => Str::slug('Endokrynologia ginekologiczna i rozrodczość')]);
        Specialization::create(['name' => 'Endokrynologia i diabetologia dzieciąca', 'slug' => Str::slug('Endokrynologia i diabetologia dzieciąca')]);
        Specialization::create(['name' => 'Farmakologia kliniczna', 'slug' => Str::slug('Farmakologia kliniczna')]);
        Specialization::create(['name' => 'Gastroenterologia', 'slug' => Str::slug('Gastroenterologia')]);
        Specialization::create(['name' => 'Gastroenterologia dziecięca', 'slug' => Str::slug('Gastroenterologia dziecięca')]);
        Specialization::create(['name' => 'Genetyka kliniczna', 'slug' => Str::slug('Genetyka kliniczna')]);
        Specialization::create(['name' => 'Geriatria', 'slug' => Str::slug('Geriatria')]);
        Specialization::create(['name' => 'Ginekologia onkologiczna', 'slug' => Str::slug('Ginekologia onkologiczna')]);
        Specialization::create(['name' => 'Hematologia', 'slug' => Str::slug('Hematologia')]);
        Specialization::create(['name' => 'Hipertensjologia', 'slug' => Str::slug('Hipertensjologia')]);
        Specialization::create(['name' => 'Immunologia kliniczna', 'slug' => Str::slug('Immunologia kliniczna')]);
        Specialization::create(['name' => 'Intensywna terapia', 'slug' => Str::slug('Intensywna terapia')]);
        Specialization::create(['name' => 'Kardiochirurgia', 'slug' => Str::slug('Kardiochirurgia')]);
        Specialization::create(['name' => 'Kardiologia', 'slug' => Str::slug('Kardiologia')]);
        Specialization::create(['name' => 'Kardiologia dziecięca', 'slug' => Str::slug('Kardiologia dziecięca')]);
        Specialization::create(['name' => 'Medycyna lotnicza', 'slug' => Str::slug('Medycyna lotnicza')]);
        Specialization::create(['name' => 'Medycyna morska i tropikalna', 'slug' => Str::slug('Medycyna morska i tropikalna')]);
        Specialization::create(['name' => 'Medycyna nuklearna', 'slug' => Str::slug('Medycyna nuklearna')]);
        Specialization::create(['name' => 'Medycyna paliatywna', 'slug' => Str::slug('Medycyna paliatywna')]);
        Specialization::create(['name' => 'Medycyna pracy', 'slug' => Str::slug('Medycyna pracy')]);
        Specialization::create(['name' => 'Medycyna ratunkowa', 'slug' => Str::slug('Medycyna ratunkowa')]);
        Specialization::create(['name' => 'Medycyna rodzinna', 'slug' => Str::slug('Medycyna rodzinna')]);
        Specialization::create(['name' => 'Medycyna sądowa', 'slug' => Str::slug('Medycyna sądowa')]);
        Specialization::create(['name' => 'Medycyna sportowa', 'slug' => Str::slug('Medycyna sportowa')]);
        Specialization::create(['name' => 'Mikrobiologia lekarska', 'slug' => Str::slug('Mikrobiologia lekarska')]);
        Specialization::create(['name' => 'Nefrologia', 'slug' => Str::slug('Nefrologia')]);
        Specialization::create(['name' => 'Nefrologia dziecięca', 'slug' => Str::slug('Nefrologia dziecięca')]);
        Specialization::create(['name' => 'Neonatologia', 'slug' => Str::slug('Neonatologia')]);
        Specialization::create(['name' => 'Neurochirurgia', 'slug' => Str::slug('Neurochirurgia')]);
        Specialization::create(['name' => 'Neurologia dziecięca', 'slug' => Str::slug('Neurologia dziecięca')]);
        Specialization::create(['name' => 'Neuropatologia', 'slug' => Str::slug('Neuropatologia')]);
        Specialization::create(['name' => 'Okulistyka', 'slug' => Str::slug('Okulistyka')]);
        Specialization::create(['name' => 'Onkologia i hematologia dziecięca', 'slug' => Str::slug('Onkologia i hematologia dziecięca')]);
        Specialization::create(['name' => 'Onkologia kliniczna', 'slug' => Str::slug('Onkologia kliniczna')]);
        Specialization::create(['name' => 'Ortopedia', 'slug' => Str::slug('Ortopedia')]);
        Specialization::create(['name' => 'Otorynolaryngologia', 'slug' => Str::slug('Otorynolaryngologia')]);
        Specialization::create(['name' => 'Otorynolaryngologia dziecięca', 'slug' => Str::slug('Otorynolaryngologia dziecięca')]);
        Specialization::create(['name' => 'Patomorfologia', 'slug' => Str::slug('Patomorfologia')]);
        Specialization::create(['name' => 'Pediatria', 'slug' => Str::slug('Pediatria')]);
        Specialization::create(['name' => 'Pediatria metaboliczna', 'slug' => Str::slug('Pediatria metaboliczna')]);
        Specialization::create(['name' => 'Perinatologia', 'slug' => Str::slug('Perinatologia')]);
        Specialization::create(['name' => 'Położnictwo i ginekologia', 'slug' => Str::slug('Położnictwo i ginekologia')]);
        Specialization::create(['name' => 'Psychiatria', 'slug' => Str::slug('Psychiatria')]);
        Specialization::create(['name' => 'Psychiatria dzieci i młodzieży', 'slug' => Str::slug('Psychiatria dzieci i młodzieży')]);
        Specialization::create(['name' => 'Radiologia i diagnostyka obrazowa', 'slug' => Str::slug('Radiologia i diagnostyka obrazowa')]);
        Specialization::create(['name' => 'Radioterapia onkologiczna', 'slug' => Str::slug('Radioterapia onkologiczna')]);
        Specialization::create(['name' => 'Rehabilitacja medyczna', 'slug' => Str::slug('Rehabilitacja medyczna')]);
        Specialization::create(['name' => 'Reumatologia', 'slug' => Str::slug('Reumatologia')]);
        Specialization::create(['name' => 'Seksuologia', 'slug' => Str::slug('Seksuologia')]);
        Specialization::create(['name' => 'Toksykologia kliniczna', 'slug' => Str::slug('Toksykologia kliniczna')]);
        Specialization::create(['name' => 'Transfuzjologia kliniczna', 'slug' => Str::slug('Transfuzjologia kliniczna')]);
        Specialization::create(['name' => 'Transplantologia kliniczna', 'slug' => Str::slug('Transplantologia kliniczna')]);
        Specialization::create(['name' => 'Urologia', 'slug' => Str::slug('Urologia')]);
        Specialization::create(['name' => 'Urologia dziecięca', 'slug' => Str::slug('Urologia dziecięca')]);
        Specialization::create(['name' => 'Zdrowie publiczne', 'slug' => Str::slug('Zdrowie publiczne')]);
        Specialization::create(['name' => 'Epidemiologia', 'slug' => Str::slug('Epidemiologia')]);
        Specialization::create(['name' => 'Chirurgia stomatologiczna', 'slug' => Str::slug('Chirurgia stomatologiczna')]);
        Specialization::create(['name' => 'Chirurgia szczękowo-twarzowa', 'slug' => Str::slug('Chirurgia szczękowo-twarzowa')]);
        Specialization::create(['name' => 'Ortodoncja', 'slug' => Str::slug('Ortodoncja')]);
        Specialization::create(['name' => 'Periodontologia', 'slug' => Str::slug('Periodontologia')]);
        Specialization::create(['name' => 'Protetyka stomatologiczna', 'slug' => Str::slug('Protetyka stomatologiczna')]);
        Specialization::create(['name' => 'Stomatologia zachowawcza z endodoncją', 'slug' => Str::slug('Stomatologia zachowawcza z endodoncją')]);
        Specialization::create(['name' => 'Stomatologia dziecięca', 'slug' => Str::slug('Stomatologia dziecięca')]);
    }
}
