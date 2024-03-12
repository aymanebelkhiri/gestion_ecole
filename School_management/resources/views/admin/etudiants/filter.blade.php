@extends('admin.header')
@section('adminContent')
@php
    use App\Models\Prof;
    use App\Models\MessageProf;
    use App\Models\Etudiant;
    use App\Models\Groupe;
    use App\Models\FiliéresProf;
    use App\Models\Filiére;
    $etudiants=Etudiant::where("Groupe",$data["grp"])->get();
@endphp
    <div class="container">
        <center><h1><i>List Students</i></h1></center><br>
        <form action="{{route('filtrer')}}" method="post" class="row">
            @csrf
            <div class="col-6">
        
                <label  class=" form-label">  filiere :</label><br>
                <select id="filiere" class="form-select" name="filiere" placeholder="filiere" onchange="change(this.value)">
                    <option></option>
                        <script>
                            var dico = {!! json_encode($dico_filiere) !!};
                            var dico2 = {!! json_encode($dico_grp) !!};
            
            
                            var selectElement = document.getElementById("filiere");
                            
            
                            for (var key in dico) {
                            if (dico.hasOwnProperty(key)) {
                                var option = document.createElement("option");
                                option.value = key;
                                option.text = key;
                                selectElement.append(option);
                            }
                            }
            
                        </script>
                    </select><br>
            </div>
            <div class="col-6">
            
                <label  class=" form-label">  Groupe :</label><br>
                <select id="additionalSelect" name="grp" class="form-select" onchange="change2(this.value)">
        
                    <option></option>
                        <script>
                            function change(value) {
                                    var selectElement = document.getElementById("additionalSelect");
                                    var liste = dico[value];
                                    selectElement.innerHTML = "";

                                    var emptyOption = document.createElement("option");
                                    selectElement.appendChild(emptyOption);

                                    for (var i = 0; i < liste.length; i++) {
                                        var splitValue = liste[i].split("/"); // Sépare l'ID du groupe et le nom du groupe
                                        var option = document.createElement("option");
                                        option.value = splitValue[0]; // Assigne l'ID du groupe à la valeur de l'option
                                        option.text = splitValue[1]; // Assigne le nom du groupe au texte de l'option
                                        selectElement.appendChild(option);
                                    }
                                }
                        </script>
                </select>
            </div>
            <center>

                <button type="submit" class="btn btn-primary col-4">add</button>
            </center>
        </form>
        
    </div> 
@endsection