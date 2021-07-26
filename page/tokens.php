<?php

    require './compiler/scanner/tokens.php';

    function displayTable($token_array) {
        foreach ($token_array as $key => $value) {
            if ($key % 7 == 0) {
                echo "<tr>";
            }
            echo "<td>" . $value . "</td>";
            if ($key % 7 == 6) {
                echo "</tr>";
            }
        }
    }

?>

<div id="tokens-page">
<div class="container">
    <h2><strong>Daftar Token Pada C++</strong></h2>
   
        <p>
            Token merupakan bagian unit terkecil pada sebuah program. Token bertindak 
            sebagai blok-blok pembentuk sebuah program. Sama seperti kombinasi setiap 
            kata membentuk kalimat untuk menyampaikan maksud seseorang, kombinasi 
            dari tiap token bertujuan membentuk operasi logika untuk mencapai tujuan  
            suatu bahasa pemrograman.
        </p>
    
    <h3>1. Keyword</h3>
    <p>
        Keyword merupakan kata-kata pada C++ yang sudah digunakan untuk fungsi tertentu.
        Kata-kata tersebut tidak dapat digunakan untuk tujuan lain seperti untuk penamaan variable,
        fungsi, kelas dan lainnya.
    </p>
    <p>Berikut beberapa daftar keyword standar pada C++ yang digunakan pada program analyzer :</p>
    <div class="table-responsive">
        <table class="table table-bordered">
            <?php displayTable($keywords); ?>
        </table>
    </div>

    <h3>2. Identifier</h3>
    <p>
        Identifier memperbolehkan programmer untuk menetapkan suatu nilai atau data baik variabel,
        array, fungsi, kelas ke dalam suatu perwakilannya yang disebut identifier. Beberapa aturan 
        penamaan identifier pada C++ seperti :
        <ul>
            <li>Karakter pertama harus huruf atau underscor</li>
            <li>Tidak boleh menggunakan simbol kusus seperti %, $, #, @ dan lainya.</li>
            <li>Tidak boleh menggunakan keyword</li>
            <li>Tidak boleh ada spasi</li>
            <li>Jumlah karakter dibatasi 31 buah</li>
            <li>Bersifat case sensitive</li>
        </ul>    
    </p>
    <p>Berikut beberapa contoh penamaan identifier pada C++ yang dapat dideteksi pada program analyzer :</p>
    <div class="table-responsive">
        <table class="table table-bordered">
            <tr>
                <td>a</td>
                <td>_delete</td>
                <td>school.fee</td>
                <td>employee_name</td>
                <td>myBook</td>
            </tr>
        </table>
    </div>

    <h3>3. Number</h3>
    <p>
        Number merupakan bentuk data berupa angka dapat bertipe int, short, long, float and double, dan lainnya.
    </p>
    <p>Berikut beberapa contoh number pada C++ :</p>
    <div class="table-responsive">
        <table class="table table-bordered">
            <tr>
                <td>10</td>
                <td>1000000</td>
                <td>3.912348239293;</td>
                <td>9.295f</td>
                <td>325E25</td>
            </tr>
        </table>
    </div>

    <h3>4. String dan Karakter</h3>
    <p>
        String pada C++ merupakan data berbentuk tulisan yang diapit oleh <i>double quote</i> (""). 
        Apabila diapit oleh <i>single quote</i> ('') disebut karakter dan hanya terdiri dari satu 
        elemen karakter saja.
    </p>
    <p>Berikut beberapa contoh string dan karakter pada C++ :</p>
    <div class="table-responsive">
        <table class="table table-bordered">
            <tr>
                <td>char salam = "Hello"</td>
                <td>char keterangan = "Ini merupakan contoh string"</td>
                <td>char gol_darah = 'O'</td>
            </tr>
        </table>
    </div>

    <h3>5. Konstanta</h3>
    <p>
        Konstanta atau bisa disebut literal merupakan nilai yang biasanya tidak berubah,
        sesudah didefinisikan. Konstanta dapat berupa bilangan integer ataupun decimal, 
        string atau character, bilangan oktal maupun hexadecimal. 
    </p>
    <p>Berikut beberapa contoh konstanta C++ yang dapat dideteksi pada program analyzer :</p>
    <div class="table-responsive">
        <table class="table table-bordered">
            <tr>
                <td>const int data = 5;</td>
                <td>const float e = 2.71;</td>
                <td>const char answer = 'y';</td>
                <td>const char title = "DataFlair";</td>
                <td>const int oct = 034;</td>
                <td>const int hex = 0x40;</td>
            </tr>
        </table>
    </div>

    <h3>6. Special Symbol</h3>
    <p>
        Keyword merupakan kata-kata pada C++ yang sudah digunakan untuk fungsi tertentu.
        Kata-kata tersebut tidak dapat digunakan untuk tujuan lain seperti untuk penamaan variable,
        fungsi, kelas dan lainnya.
    </p>
    <p>Berikut beberapa daftar keyword standar pada C++ yang digunakan pada program analyzer :</p>

    <div class="table-responsive">
        <table class="table table-bordered">
            <?php displayTable($special_symbols); ?>
        </table>
    </div>

    <h3>7. Operator</h3>
    <p>
        Operator merupakan simbol yang digunakan untuk menjalankan operasi spesifik pada data 
        yang biasa disebut operand. Operator pada C++ terbagi atas operator unary, binary, dan ternary.
    </p>
    <p><strong>Unary</strong> : melibatkan sebuah operand, sebagai contoh !c</p>
    <p><strong>Binary</strong> : melibatkan dua buah operand, sebagai contoh a + b. Beberapa operator yang termasuk binary meliputi :</p>
    <ul>
        <li>Aritmatika</li>
        <li>Relational</li>
        <li>Logical</li>
        <li>Assignment</li>
        <li>Bitwise</li>
        <li>Conditional</li>
    </ul>
    <p><strong>Ternary</strong> : melibatkan tiga buah operand, sebagai contoh ?: digunakan untuk menggantikan if-else.</p>
    
    <p>Berikut beberapa daftar operator pada C++ yang digunakan pada program analyzer :</p>

    <div class="table-responsive">
        <table class="table table-bordered">
            <?php displayTable($operators); ?>
        </table>
    </div>

    <h3>8. Komentar</h3>
    <p>
        Komentar merupakan baris yang tidak dieksekusi oleh kompilator sebagai perintah.
        Komentar biasanya sebagai keterangan tentang kode yang ditulis. Komentar pada C++
        diawali dengan simbol "//" untuk <i>single line</i> dan diapit oleh "/*" dan "*/"
        untuk multi line komentar.
    </p>
    <p>Berikut contoh komentar pada C++ yang dapat dideteksi pada program analyzer :</p>
    <ul>
        <li>// berikut merupakan komentar satu bari</li>
        <li>/* berikut merupakan contoh komentar <br>
               yang terdiri dari lebih dari satu <br>
               bari */ 
        </li>
    </ul>

    <h3>9. Token yang tidak dapat dideteksi</h3>
    <p>
        Token yang tidak dapat dideteksi maksudnya token yang tidak dapat dibaca oleh program 
        analyzer kategorinya. Pada kolom kategori tabel daftar token akan menunjukkan "Couldn't analyze token", 
        dan pada pada kolom Error tabel total token akan menunjukkan jumlah token yang tidak 
        dapat ditentukan kategorinya. 
    </p>
    <p>Berikut beberapa token C++ yang tidak dapat dideteksi atau salah membaca pada program analyzer sejauh ini :</p>
    <ul>
       <li>Simbol pointer *</li>
       <li>Module C++ seperti std++.h</li>
       <li>Simbol C++ seperti "\n", "\t"</li>
       <li>Array dua dimensi seperti book[i][j]</li>
       <li>Membaca nilai boolean true dan false sebagai string</li>
    </ul>
   

</div>
</div>