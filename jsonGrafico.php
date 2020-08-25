<?php
$named_array = array(
    "nodes" => array(
        array(
            "node" => 0,"title" => "India","identifier" => "india","name" => "indiaUndergrad","level" => "Undergrad"
        ),
        array(
            "node" => 1,"title" => "Others","identifier" => "others","name" => "othersUndergrad","level" => "Undergrad"
        ),
        array(
            "node" => 2,"title" => "Alemania","identifier" => "alemania","name" => "alemaniaUndergrad","level" => "Undergrad"
        ),
        array(
            "node" => 3,"title" => "Vietnam","identifier" => "vietnam","name" => "vietnamUndergrad","level" => "Undergrad"
        ),
        array(
            "node" => 4,"title" => "Brazil","identifier" => "brazil","name" => "brazilUndergrad","level" => "Undergrad"
        ),
        array(
            "node" => 5,"title" => "Canada","identifier" => "canada","name" => "canadaUndergrad","level" => "Undergrad"
        ),
        array(
            "node" => 6,"title" => "Iran","identifier" => "iran","name" => "iranUndergrad","level" => "Undergrad"
        ),
        array(
            "node" => 7,"title" => "South Korea","identifier" => "southKorea","name" => "southKoreaUndergrad","level" => "Undergrad"
        ),
        array(
            "node" => 8,"title" => "UK","identifier" => "uk","name" => "ukUndergrad","level" => "Undergrad"
        ),
        array(
            "node" => 9,"title" => "Israel","identifier" => "israel","name" => "israelUndergrad","level" => "Undergrad"
        ),
        array(
            "node" => 10,"title" => "NA","identifier" => "na","name" => "naUndergrad","level" => "Undergrad"
        ),
        array(
            "node" => 11,"title" => "Others","identifier" => "others","name" => "othersGrad","level" => "Grad"
        ),
        array(
            "node" => 12,"title" => "Alemania","identifier" => "alemania","name" => "alemaniaGrad","level" => "Grad"
        ),
        array(
            "node" => 13,"title" => "Brazil","identifier" => "brazil","name" => "brazilGrad","level" => "Grad"
        ),
        array(
            "node" => 14,"title" => "Canada","identifier" => "canada","name" => "canadaGrad","level" => "Grad"
        ),
        array(
            "node" => 15,"title" => "Vietnam","identifier" => "vietnam","name" => "vietnamGrad","level" => "Grad"
        ),
        array(
            "node" => 16,"title" => "NA","identifier" => "na","name" => "naGrad","level" => "Grad"
        ),
        array(
            "node" => 17,"title" => "Australia","identifier" => "australia","name" => "australiaGrad","level" => "Grad"
        ),
        array(
            "node" => 18,"title" => "UK","identifier" => "uk","name" => "ukGrad","level" => "Grad"
        ),
        array(
            "node" => 19,"title" => "Israel","identifier" => "israel","name" => "israelGrad","level" => "Grad"
        ),
        array(
            "node" => 20,"title" => "Brazil","identifier" => "brazil","name" => "brazilCurrent","level" => "Current"
        ),
        array(
            "node" => 21,"title" => "Alemania","identifier" => "alemania","name" => "alemaniaCurrent","level" => "Current"
        ),
        array(
            "node" => 22,"title" => "Vietnam","identifier" => "vietnam","name" => "vietnamCurrent","level" => "Current"
        ),
        array(
            "node" => 23,"title" => "Australia","identifier" => "australia","name" => "australiaCurrent","level" => "Current"
        ),
        array(
            "node" => 24,"title" => "UK","identifier" => "uk","name" => "ukCurrent","level" => "Current"
        ),
        array(
            "node" => 25,"title" => "Israel","identifier" => "israel","name" => "israelCurrent","level" => "Current"
        ),
        array(
            "node" => 26,"title" => "Canada","identifier" => "canada","name" => "canadaCurrent","level" => "Current"
        ),
        array(
            "node" => 27,"title" => "Others","identifier" => "others","name" => "othersCurrent","level" => "Current"
        )
    ),
    "links" => array(
        array(
            "id" => "indiaUndergrad-othersGrad","class" => "ug","source" => 0,"target" => 11,"value" => 3,"uindia" => 3,"gothers" => 3,"cbrazil" => 1,"cothers" => 1
        ),
        array(
            "id"=>"othersGrad-brazilCurrent","class"=>"gc","source"=>11,"target"=>20,"value"=>3,"uindia"=>1,"gothers"=>3,"cbrazil"=>3,"uothers"=>2
        ),
        array(
            "id"=>"othersUndergrad-alemaniaGrad","class"=>"ug","source"=>1,"target"=>12,"value"=>9,"uothers"=>9,"galemania"=>9,"calemania"=>3,"ccanada"=>2,"cbrazil"=>1,"cothers"=>1
        ),
        array(
            "id"=>"alemaniaGrad-alemaniaCurrent","class"=>"gc","source"=>12,"target"=>21,"value"=>50,"uothers"=>3,"galemania"=>50,"calemania"=>50,"ualemania"=>44,"uuk"=>2,"uindia"=>1
        ),
        array(
            "id"=>"indiaUndergrad-alemaniaGrad","class"=>"ug","source"=>0,"target"=>12,"value"=>6,"uindia"=>6,"galemania"=>6,"calemania"=>2,"cbrazil"=>1
        ),
        array(
            "id"=>"alemaniaUndergrad-alemaniaGrad","class"=>"ug","source"=>2,"target"=>12,"value"=>80,"ualemania"=>80,"galemania"=>80,"calemania"=>44,"cbrazil"=>16,"cuk"=>1,"ccanada"=>1
        ),
        array(
            "id"=>"indiaUndergrad-brazilGrad","class"=>"ug","source"=>0,"target"=>13,"value"=>38,"uindia"=>38,"gbrazil"=>38,"cbrazil"=>27,"cothers"=>1
        ),
        array(
            "id"=>"brazilGrad-brazilCurrent","class"=>"gc","source"=>13,"target"=>20,"value"=>189,"uindia"=>27,"gbrazil"=>189,"cbrazil"=>189,"uvietnam"=>61,"ubrazil"=>55,"ualemania"=>13,"uiran"=>5,"uothers"=>17,"uuk"=>2,"ucanada"=>3,"usouthKorea"=>4,"uisrael"=>2
        ),
        array(
            "id"=>"vietnamUndergrad-brazilGrad","class"=>"ug","source"=>3,"target"=>13,"value"=>109,"uvietnam"=>109,"gbrazil"=>109,"cbrazil"=>61,"cvietnam"=>7,"calemania"=>1
        ),
        array(
            "id"=>"brazilUndergrad-brazilGrad","class"=>"ug","source"=>4,"target"=>13,"value"=>114,"ubrazil"=>114,"gbrazil"=>114,"cbrazil"=>55,"calemania"=>1,"ccanada"=>5,"cuk"=>1,"cvietnam"=>1
        ),
        array(
            "id"=>"canadaUndergrad-canadaGrad","class"=>"ug","source"=>5,"target"=>14,"value"=>19,"ucanada"=>19,"gcanada"=>19,"cbrazil"=>3,"ccanada"=>8,"cvietnam"=>1,"cuk"=>2
        ),
        array(
            "id"=>"canadaGrad-brazilCurrent","class"=>"gc","source"=>14,"target"=>20,"value"=>7,"ucanada"=>3,"gcanada"=>7,"cbrazil"=>7,"uindia"=>1,"ubrazil"=>2,"uiran"=>1
        ),
        array(
            "id"=>"indiaUndergrad-canadaGrad","class"=>"ug","source"=>0,"target"=>14,"value"=>4,"uindia"=>4,"gcanada"=>4,"cbrazil"=>1,"cuk"=>2
        ),
        array(
            "id"=>"alemaniaUndergrad-brazilGrad","class"=>"ug","source"=>2,"target"=>13,"value"=>22,"ualemania"=>22,"gbrazil"=>22,"cbrazil"=>13,"calemania"=>6
        ),
        array(
            "id"=>"iranUndergrad-brazilGrad","class"=>"ug","source"=>6,"target"=>13,"value"=>14,"uiran"=>14,"gbrazil"=>14,"cbrazil"=>5,"ccanada"=>1
        ),
        array(
            "id"=>"vietnamUndergrad-vietnamGrad","class"=>"ug","source"=>3,"target"=>15,"value"=>59,"uvietnam"=>59,"gvietnam"=>59,"cvietnam"=>32,"cbrazil"=>4,"cothers"=>4,"cuk"=>1,"caustralia"=>1
        ),
        array(
            "id"=>"alemaniaGrad-brazilCurrent","class"=>"gc","source"=>12,"target"=>20,"value"=>21,"ualemania"=>16,"galemania"=>21,"cbrazil"=>21,"ubrazil"=>1,"uothers"=>1,"uiran"=>1,"uindia"=>1,"uvietnam"=>1
        ),
        array(
            "id"=>"brazilUndergrad-canadaGrad","class"=>"ug","source"=>4,"target"=>14,"value"=>5,"ubrazil"=>5,"gcanada"=>5,"cbrazil"=>2,"ccanada"=>1
        ),
        array(
            "id"=>"canadaUndergrad-brazilGrad","class"=>"ug","source"=>5,"target"=>13,"value"=>8,"ucanada"=>8,"gbrazil"=>8,"cbrazil"=>4,"ccanada"=>2
        ),
        array(
            "id"=>"othersUndergrad-brazilGrad","class"=>"ug","source"=>1,"target"=>13,"value"=>20,"uothers"=>20,"gbrazil"=>20,"cbrazil"=>17
        ),
        array(
            "id"=>"vietnamGrad-vietnamCurrent","class"=>"gc","source"=>15,"target"=>22,"value"=>31,"uvietnam"=>31,"gvietnam"=>31,"cvietnam"=>31
        ),
        array(
            "id"=>"brazilGrad-vietnamCurrent","class"=>"gc","source"=>13,"target"=>22,"value"=>8,"uvietnam"=>7,"gbrazil"=>8,"cvietnam"=>8,"ubrazil"=>1
        ),
        array(
            "id"=>"southKoreaUndergrad-brazilGrad","class"=>"ug","source"=>7,"target"=>13,"value"=>6,"usouthKorea"=>6,"gbrazil"=>6,"cbrazil"=>5,"cothers"=>1
        ),
        array(
            "id"=>"ukUndergrad-brazilGrad","class"=>"ug","source"=>8,"target"=>13,"value"=>7,"uuk"=>7,"gbrazil"=>7,"cbrazil"=>3,"cuk"=>1
        ),
        array(
            "id"=>"brazilGrad-alemaniaCurrent","class"=>"gc","source"=>13,"target"=>21,"value"=>8,"ubrazil"=>1,"gbrazil"=>8,"calemania"=>8,"ualemania"=>6,"uvietnam"=>1
        ),
        array(
            "id"=>"israelUndergrad-brazilGrad","class"=>"ug","source"=>9,"target"=>13,"value"=>6,"uisrael"=>6,"gbrazil"=>6,"cbrazil"=>3,"cisrael"=>1
        ),
        array(
            "id"=>"iranUndergrad-australiaGrad","class"=>"ug","source"=>6,"target"=>17,"value"=>2,"uiran"=>2,"gaustralia"=>2,"caustralia"=>1,"cbrazil"=>1
        ),
        array(
            "id"=>"indiaUndergrad-australiaGrad","class"=>"ug","source"=>0,"target"=>17,"value"=>3,"uindia"=>3,"gaustralia"=>3,"caustralia"=>3
        ),
        array(
            "id"=>"australiaGrad-australiaCurrent","class"=>"gc","source"=>17,"target"=>23,"value"=>3,"uindia"=>3,"gaustralia"=>3,"caustralia"=>3
        ),
        array(
            "id"=>"canadaGrad-ukCurrent","class"=>"gc","source"=>14,"target"=>24,"value"=>6,"uindia"=>2,"gcanada"=>6,"cuk"=>6,"ualemania"=>2,"ucanada"=>2
        ),
        array(
            "id"=>"alemaniaUndergrad-ukGrad","class"=>"ug","source"=>2,"target"=>18,"value"=>8,"ualemania"=>8,"guk"=>8,"cuk"=>3,"calemania"=>2
        ),
        array(
            "id"=>"ukGrad-ukCurrent","class"=>"gc","source"=>18,"target"=>24,"value"=>15,"ualemania"=>3,"guk"=>15,"cuk"=>15,"una"=>1,"uuk"=>8,"uvietnam"=>1,"uothers"=>2
        ),
        array(
            "id"=>"alemaniaGrad-ukCurrent","class"=>"gc","source"=>12,"target"=>24,"value"=>1,"ualemania"=>1,"galemania"=>1,"cuk"=>1
        ),
        array(
            "id"=>"othersUndergrad-australiaGrad","class"=>"ug","source"=>1,"target"=>17,"value"=>1,"uothers"=>1,"gaustralia"=>1,"cuk"=>1
        ),
        array(
            "id"=>"australiaGrad-ukCurrent","class"=>"gc","source"=>17,"target"=>24,"value"=>2,"uothers"=>1,"gaustralia"=>2,"cuk"=>2,"uvietnam"=>1
        ),
        array(
            "id"=>"israelUndergrad-israelGrad","class"=>"ug","source"=>9,"target"=>19,"value"=>12,"uisrael"=>12,"gisrael"=>12,"cisrael"=>8,"cbrazil"=>2
        ),
        array(
            "id"=>"israelGrad-israelCurrent","class"=>"gc","source"=>19,"target"=>25,"value"=>8,"uisrael"=>8,"gisrael"=>8,"cisrael"=>8
        ),
        array(
            "id"=>"brazilUndergrad-alemaniaGrad","class"=>"ug","source"=>4,"target"=>12,"value"=>1,"ubrazil"=>1,"galemania"=>1,"cbrazil"=>1
        ),
        array(
            "id"=>"vietnamGrad-brazilCurrent","class"=>"gc","source"=>15,"target"=>20,"value"=>5,"uvietnam"=>4,"gvietnam"=>5,"cbrazil"=>5,"ubrazil"=>1
        ),
        array(
            "id"=>"canadaGrad-canadaCurrent","class"=>"gc","source"=>14,"target"=>26,"value"=>14,"ucanada"=>8,"gcanada"=>14,"ccanada"=>14,"uiran"=>1,"uothers"=>1,"ualemania"=>1,"uvietnam"=>2,"ubrazil"=>1
        ),
        array(
            "id"=>"iranUndergrad-alemaniaGrad","class"=>"ug","source"=>6,"target"=>12,"value"=>2,"uiran"=>2,"galemania"=>2,"ccanada"=>1,"cbrazil"=>1
        ),
        array(
            "id"=>"alemaniaGrad-canadaCurrent","class"=>"gc","source"=>12,"target"=>26,"value"=>4,"uiran"=>1,"galemania"=>4,"ccanada"=>4,"uothers"=>2,"ualemania"=>1
        ),
        array(
            "id"=>"ukUndergrad-alemaniaGrad","class"=>"ug","source"=>8,"target"=>12,"value"=>2,"uuk"=>2,"galemania"=>2,"calemania"=>2
        ),
        array(
            "id"=>"southKoreaUndergrad-othersGrad","class"=>"ug","source"=>7,"target"=>11,"value"=>4,"usouthKorea"=>4,"gothers"=>4,"cothers"=>3
        ),
        array(
            "id"=>"othersGrad-othersCurrent","class"=>"gc","source"=>11,"target"=>27,"value"=>12,"usouthKorea"=>3,"gothers"=>12,"cothers"=>12,"uothers"=>8,"uindia"=>1
        ),
        array(
            "id"=>"othersUndergrad-othersGrad","class"=>"ug","source"=>1,"target"=>11,"value"=>15,"uothers"=>15,"gothers"=>15,"calemania"=>1,"cothers"=>8,"cbrazil"=>2,"ccanada"=>1,"cvietnam"=>1
        ),
        array(
            "id"=>"othersGrad-alemaniaCurrent","class"=>"gc","source"=>11,"target"=>21,"value"=>3,"uothers"=>1,"gothers"=>3,"calemania"=>3,"ualemania"=>1,"uvietnam"=>1
        ),
        array(
            "id"=>"othersUndergrad-ukGrad","class"=>"ug","source"=>1,"target"=>18,"value"=>6,"uothers"=>6,"guk"=>6,"cbrazil"=>2,"cuk"=>2,"cothers"=>1
        ),
        array(
            "id"=>"ukGrad-brazilCurrent","class"=>"gc","source"=>18,"target"=>20,"value"=>6,"uothers"=>2,"guk"=>6,"cbrazil"=>6,"ucanada"=>2,"ubrazil"=>1,"uuk"=>1
        ),
        array(
            "id"=>"brazilGrad-canadaCurrent","class"=>"gc","source"=>13,"target"=>26,"value"=>8,"ubrazil"=>5,"gbrazil"=>8,"ccanada"=>8,"ucanada"=>2,"uiran"=>1
        ),
        array(
            "id"=>"vietnamUndergrad-australiaGrad","class"=>"ug","source"=>3,"target"=>17,"value"=>5,"uvietnam"=>5,"gaustralia"=>5,"cbrazil"=>2,"cvietnam"=>1,"cuk"=>1
        ),
        array(
            "id"=>"australiaGrad-brazilCurrent","class"=>"gc","source"=>17,"target"=>20,"value"=>4,"uvietnam"=>2,"gaustralia"=>4,"cbrazil"=>4,"uiran"=>1,"ubrazil"=>1
        ),
        array(
            "id"=>"israelGrad-brazilCurrent","class"=>"gc","source"=>19,"target"=>20,"value"=>2,"uisrael"=>2,"gisrael"=>2,"cbrazil"=>2
        ),
        array(
            "id"=>"ukGrad-alemaniaCurrent","class"=>"gc","source"=>18,"target"=>21,"value"=>2,"ualemania"=>2,"guk"=>2,"calemania"=>2
        ),
        array(
            "id"=>"iranUndergrad-canadaGrad","class"=>"ug","source"=>6,"target"=>14,"value"=>3,"uiran"=>3,"gcanada"=>3,"ccanada"=>1,"cbrazil"=>1
        ),
        array(
            "id"=>"brazilGrad-ukCurrent","class"=>"gc","source"=>13,"target"=>24,"value"=>2,"uuk"=>1,"gbrazil"=>2,"cuk"=>2,"ubrazil"=>1
        ),
        array(
            "id"=>"alemaniaUndergrad-canadaGrad","class"=>"ug","source"=>2,"target"=>14,"value"=>3,"ualemania"=>3,"gcanada"=>3,"cuk"=>2,"ccanada"=>1
        ),
        array(
            "id"=>"vietnamUndergrad-alemaniaGrad","class"=>"ug","source"=>3,"target"=>12,"value"=>3,"uvietnam"=>3,"galemania"=>3,"cvietnam"=>2,"cbrazil"=>1
        ),
        array(
            "id"=>"alemaniaGrad-vietnamCurrent","class"=>"gc","source"=>12,"target"=>22,"value"=>2,"uvietnam"=>2,"galemania"=>2,"cvietnam"=>2
        ),
        array(
            "id"=>"canadaGrad-vietnamCurrent","class"=>"gc","source"=>14,"target"=>22,"value"=>1,"ucanada"=>1,"gcanada"=>1,"cvietnam"=>1
        ),
        array(
            "id"=>"alemaniaUndergrad-othersGrad","class"=>"ug","source"=>2,"target"=>11,"value"=>2,"ualemania"=>2,"gothers"=>2,"calemania"=>1,"ccanada"=>1
        ),
        array(
            "id"=>"brazilGrad-othersCurrent","class"=>"gc","source"=>13,"target"=>27,"value"=>3,"uindia"=>1,"gbrazil"=>3,"cothers"=>3,"usouthKorea"=>1,"una"=>1
        ),
        array(
            "id"=>"vietnamUndergrad-ukGrad","class"=>"ug","source"=>3,"target"=>18,"value"=>6,"uvietnam"=>6,"guk"=>6,"cuk"=>2,"caustralia"=>3
        ),
        array(
            "id"=>"vietnamGrad-othersCurrent","class"=>"gc","source"=>15,"target"=>27,"value"=>4,"uvietnam"=>4,"gvietnam"=>4,"cothers"=>4
        ),
        array(
            "id"=>"vietnamUndergrad-othersGrad","class"=>"ug","source"=>3,"target"=>11,"value"=>3,"uvietnam"=>3,"gothers"=>3,"calemania"=>1,"cvietnam"=>2
        ),
        array(
            "id"=>"othersUndergrad-canadaGrad","class"=>"ug","source"=>1,"target"=>14,"value"=>2,"uothers"=>2,"gcanada"=>2,"ccanada"=>1
        ),
        array(
            "id"=>"vietnamUndergrad-canadaGrad","class"=>"ug","source"=>3,"target"=>14,"value"=>2,"uvietnam"=>2,"gcanada"=>2,"ccanada"=>2
        ),
        array(
            "id"=>"othersGrad-canadaCurrent","class"=>"gc","source"=>11,"target"=>26,"value"=>2,"uothers"=>1,"gothers"=>2,"ccanada"=>2,"ualemania"=>1
        ),
        array(
            "id"=>"canadaUndergrad-ukGrad","class"=>"ug","source"=>5,"target"=>18,"value"=>5,"ucanada"=>5,"guk"=>5,"cbrazil"=>2,"ccanada"=>2
        ),
        array(
            "id"=>"brazilUndergrad-vietnamGrad","class"=>"ug","source"=>4,"target"=>15,"value"=>1,"ubrazil"=>1,"gvietnam"=>1,"cbrazil"=>1
        ),
        array(
            "id"=>"ukUndergrad-ukGrad","class"=>"ug","source"=>8,"target"=>18,"value"=>15,"uuk"=>15,"guk"=>15,"cothers"=>1,"cbrazil"=>1,"cuk"=>8,"ccanada"=>2
        ),
        array(
            "id"=>"ukGrad-othersCurrent","class"=>"gc","source"=>18,"target"=>27,"value"=>3,"uuk"=>1,"guk"=>3,"cothers"=>3,"uothers"=>1,"una"=>1
        ),
        array(
            "id"=>"brazilUndergrad-ukGrad","class"=>"ug","source"=>4,"target"=>18,"value"=>1,"ubrazil"=>1,"guk"=>1,"cbrazil"=>1
        ),
        array(
            "id"=>"alemaniaGrad-othersCurrent","class"=>"gc","source"=>12,"target"=>27,"value"=>1,"uothers"=>1,"galemania"=>1,"cothers"=>1
        ),
        array(
            "id"=>"othersGrad-vietnamCurrent","class"=>"gc","source"=>11,"target"=>22,"value"=>3,"uvietnam"=>2,"gothers"=>3,"cvietnam"=>3,"uothers"=>1
        ),
        array(
            "id"=>"brazilGrad-israelCurrent","class"=>"gc","source"=>13,"target"=>25,"value"=>1,"uisrael"=>1,"gbrazil"=>1,"cisrael"=>1
        ),
        array(
            "id"=>"australiaGrad-vietnamCurrent","class"=>"gc","source"=>17,"target"=>22,"value"=>1,"uvietnam"=>1,"gaustralia"=>1,"cvietnam"=>1
        ),
        array(
            "id"=>"ukGrad-australiaCurrent","class"=>"gc","source"=>18,"target"=>23,"value"=>3,"uvietnam"=>3,"guk"=>3,"caustralia"=>3
        ),
        array(
            "id"=>"brazilUndergrad-australiaGrad","class"=>"ug","source"=>4,"target"=>17,"value"=>1,"ubrazil"=>1,"gaustralia"=>1,"cbrazil"=>1
        ),
        array(
            "id"=>"vietnamGrad-ukCurrent","class"=>"gc","source"=>15,"target"=>24,"value"=>1,"uvietnam"=>1,"gvietnam"=>1,"cuk"=>1
        ),
        array(
            "id"=>"vietnamGrad-australiaCurrent","class"=>"gc","source"=>15,"target"=>23,"value"=>1,"uvietnam"=>1,"gvietnam"=>1,"caustralia"=>1
        ),
        array(
            "id"=>"ukGrad-canadaCurrent","class"=>"gc","source"=>18,"target"=>26,"value"=>4,"ucanada"=>2,"guk"=>4,"ccanada"=>4,"uuk"=>2
        ),
        array(
            "id"=>"ukUndergrad-canadaGrad","class"=>"ug","source"=>8,"target"=>14,"value"=>1,"uuk"=>1,"gcanada"=>1,"ccanada"=>1
        )
    ),
    "ugTotalCount" => "638",
    "gcTotalCount" => "444",
    "levels" => array("Col_1", "Col_2", "Col_3")
);

echo json_encode($named_array);

?>