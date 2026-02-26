<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <title>Staj Projesi - Oto Servis Takip</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f5f7fa;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 750px;
            margin: 20px auto;
            background: #fff;
            padding: 20px 25px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.07);
            border-radius: 10px;
        }

        h1 {
            text-align: center;
            color: #2c3e50;
            margin-bottom: 20px;
        }

        label {
            font-weight: 600;
            display: block;
            margin-bottom: 6px;
            color: #333;
        }

        input[type="text"],
        input[type="date"],
        select,
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 6px;
            margin-bottom: 15px;
            font-size: 15px;
            
        }

        .row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #3498db;
            border: none;
            border-radius: 6px;
            color: white;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #2980b9;
        }

        .alert-success {
            background-color: #dff0d8;
            color: #3c763d;
            border-radius: 6px;
            padding: 10px 15px;
            margin-bottom: 20px;
        }

        .alert-error {
            background-color: #f2dede;
            color: #a94442;
            border-radius: 6px;
            padding: 10px 15px;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>

    <div class="container">
        <h1>Oto Servis Takip</h1>

        {{-- Başarılı mesaj --}}
        @if(session('success'))
        <div class="alert-success">{{ session('success') }}</div>
        @endif

        {{-- Hata mesajı --}}
        @if(session('error'))
        <div class="alert-error">{{ session('error') }}</div>
        @endif

        {{-- Validation hataları --}}
        @if ($errors->any())
        <div class="alert-error">
            <ul>
                @foreach ($errors->all() as $hata)
                <li>{{ $hata }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        {{-- Servis Kaydı Formu --}}
        <form id="servisForm" method="POST" action="{{ route('servis.kaydet') }}">
            @csrf

            {{-- Ad Soyad Tek kolon --}}
            <label>Müşteri Ad Soyad:</label>
            <input type="text" name="ad_soyad" required>

            {{-- Marka & Model yan yana --}}
            <div class="row">
                <div>
                    <label>Araç Markası:</label>
                    <select name="marka_id" id="marka" required>
                        <option value="">Seçiniz</option>
                        @foreach($markalar as $marka)
                        <option value="{{ $marka->id }}">{{ $marka->ad }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label>Araç Modeli:</label>
                    <select name="model_id" id="model" required>
                        <option value="">Önce marka seçiniz</option>
                    </select>
                </div>
            </div>

            {{-- Tamir Türü & Yeri yan yana --}}
            <div class="row">
                <div>
                    <label>Tamir Türü:</label>
                    <select name="tamir_turu_id" id="tamir_turu" required>
                        <option value="">Seçiniz</option>
                        @foreach($tamirTurleri as $tur)
                        <option value="{{ $tur->id }}">{{ $tur->ad }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label>Tamir Yeri:</label>
                    <select name="tamir_yeri_id" id="tamir_yeri" required>
                        <option value="">Önce tamir türü seçiniz</option>
                    </select>
                </div>
            </div>

            {{-- Tarih & Saat yan yana --}}
            <div class="row">
                <div>
                    <label>Tamir Tarihi:</label>
                    <input type="text" id="date" name="tarih" required placeholder="Tarih seçiniz">
                </div>
                <div>
                    <label>Saat:</label>
                    <select name="saat" required>
                        @for($i=8; $i<=18; $i++)
                            <option value="{{ $i }}:00">{{ $i }}:00</option>
                            <option value="{{ $i }}:30">{{ $i }}:30</option>
                        @endfor
                    </select>
                </div>
            </div>

            {{-- Notlar --}}
            <label>Servis ile ilgili notlar:</label>
            <textarea name="servis_ile_ilgili_notlar" placeholder="Servis ile ilgili notlarınızı buraya yazınız"
                style="height: 100px;"></textarea>

            <button type="submit">Kaydet</button>
        </form>
    </div>

    <script>
        $.ajaxSetup({ 
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#marka').on('change', function() {
            var markaId = $(this).val();
            if (markaId) {
                $.get('/modeller/' + markaId, function(data) {
                    $('#model').empty().append('<option value="">Seçiniz</option>');
                    $.each(data, function(i, model) {
                        $('#model').append('<option value="' + model.id + '">' + model.ad + '</option>');
                    });
                });
            } else {
                $('#model').empty().append('<option value="">Önce marka seçiniz</option>');
            }
        });

        $('#tamir_turu').on('change', function() {
            var turId = $(this).val();
            if (turId) {
                $.get('/tamir-yerleri/' + turId, function(data) {
                    $('#tamir_yeri').empty().append('<option value="">Seçiniz</option>');
                    $.each(data, function(i, yer) {
                        $('#tamir_yeri').append('<option value="' + yer.id + '">' + yer.ad + '</option>');
                    });
                });
            } else {
                $('#tamir_yeri').empty().append('<option value="">Önce tamir türü seçiniz</option>');
            }
        });

        flatpickr("#date", {
            dateFormat: "Y-m-d",
            clickOpens: true,
            minDate: "today"
        });
    </script>

</body>
</html>


