# ciberSquadCRUD

Erronka honetarako CRUD motatako web orrialde bat sortu dugu. Orri horren bitartez datuak atzitu, bistaratu eta prozesatu ahalko dugu. Orriak informazio sistemaren muina da erabiltzaileak zuzenean interakzioak eramaten dutelako aurrera. Interakzio horren emaitz moduan prozesatutako datuak aurkituko lirateke. Datu horiek zerbitzari batean dugun datu basean biltzen ditugu.

CRUD bat egiterakoan, garrantzitsua da datu-basearen barruan erabiliko diren taulak eta horien arteko erlazioak zehaztea.

Gure kasuan 4 taula ditugu, lehenengoak Kurtsoak du izena eta giltza nagusia Identifikatzailea da. Bigarrenak Ikasleak du izena, bere giltza nagusia ID da, eta kurtsoak taularekin elkartzen da kurtso_id eremuaren bidez. Hirugarren taula Erabiltzaileak du izena, taularen giltza nagusia ID da, eta ikasle_id eremuaren bidez juntatzen da Ikasleak taularekin. Gainera ikasleen taulan bakoitza matrikulatu den kurtsoaren identifikatzailea batzen dugu ere, kurtso_id-a kurtsoen taulako identifikatzailea izanik.

Azkenik, beste taula bat dugu, eskatutako erregistroen eskaerak gordetzeko. Taula honek lehen instantzia moduan sartzen diren erabiltzaileak zuzenean ez erregistratzea ahaldibetzen digu. Web orriaren administrariak izango du alta emateko ahalmena, horregatik erabiltzaile berri bat web orriaren bitartez erregistro eskaera bat egingo du eta geroago administrariak alta emango dio ikasleetan eta erabiltzaileetan. Erregistro_eskaerak taulak pertsonaren datuak, erabiltzaile izena etab batzen ditu, eta datu horien bitartez alta prozesatzen da.

Honak hau izango litzateke datu basearen diagrama. Bertan eremuen izenak eta taulen arteko erlazioak ikusi ahal dira:

<img src="datuBaseDiagrama.png" width=40%>
