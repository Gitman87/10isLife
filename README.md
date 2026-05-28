ENG

10isLife is a custom e-commerce project that I created to deepen my knowledge of backend programming, SQL database design, and writing in pure PHP. The main goal was to create a "vertical slice" – a fully functional, vertical cross-section of the most important e-commerce mechanisms. The entire visual identity, including the logo and user interface, was conceived and designed by me from scratch using Figma and Adobe Illustrator.
Tech Stack and Architecture

  The Backend was written in a PHP 8.x (Vanilla) environment, which includes a custom routing and API handling system without the use of external frameworks.

  The MySQL database was designed based on the EAV (Entity-Attribute-Value) model, allowing for flexible management of complex product variants and attributes.

  The Frontend relies on Vanilla JavaScript (ES6+) and the SCSS preprocessor, utilizing a custom component architecture and event delegation mechanism to optimize performance.

Product Catalog and Database

  Due to the educational nature of the project, the product database was limited to 100 base racket models. After accounting for all variants, the system manages a pool of 174 unique items.

  The customer database contains over 1000 records. Product data and user profiles were entered partly manually and partly generated using the Mockaroo tool.

  The first three rackets in the database (Agility Smash 500, Ultra Light Pro, and Titanium Ace 800) feature fully implemented variant logic, including racket length and grip size.

  The variant selection path requires the user to first determine the grip size (with the help of a dedicated size chart), after which the system dynamically provides the racket lengths assigned to that specific thickness.

  The "Clothing", "Balls", and "Accessories" sections were intentionally left empty to focus attention on the main system functionality handling the rackets.

  The "Brands" section is fully populated and integrated. It contains manufacturer descriptions, which can also be accessed by clicking the brand name on the product card. Clicking the "Check" button on a brand tile redirects the user directly to the manufacturer's official YouTube channel.

Authorization and Data Validation

  The login and registration system was designed from scratch with an emphasis on security standards.

  User passwords are cryptographically hashed, and input data undergoes sanitization in the backend layer. The use of prepared statements protects the database against SQL Injection attacks.

  The registration form includes a mechanism for authentic verification of the NIP (Polish Tax Identification Number). The algorithm verifies the checksum, checking the actual correctness of the tax identification number from a legal standpoint, rather than just the presence of a string of digits.

Purchasing Process and Cart

  The client-side shopping cart mechanism is based on localStorage and is handled by a custom JavaScript class. This solution minimizes the number of server requests when adding products.

  The actual verification of the cart occurs after clicking the "Checkout" button. The backend then checks inventory levels and price integrity, effectively securing the system against attempts to manipulate data in the browser's developer tools.

  During the checkout stage, the form automatically retrieves data from the database and populates the user's details, provided they are logged in during that session.

Interface and Custom Solutions

  An interactive magnifying glass was implemented on the product card, allowing for a detailed preview of the racket's texture and details. This is a completely custom design based on the CSS clip-path property.

  I presented the mechanics and operation of the magnifying glass in detail in my video material: See the magnifying glass in action on YouTube.

Current Status and Roadmap

  The product search engine is currently in the visual mockup phase – the frontend interface has not yet been integrated with the database search logic.

  The purchasing process lacks a final cart and availability verification immediately prior to transaction authorization.

  The system does not currently have a physically connected payment gateway. Ultimately, integration with the Stripe platform is planned.
  
PL

10isLife to autorski projekt sklepu internetowego, który zrealizowałem w celu pogłębienia wiedzy z zakresu programowania backendu, projektowania baz danych SQL oraz pisania w czystym PHP. Głównym założeniem było stworzenie tak zwanego "vertical slice" – w pełni funkcjonalnego, pionowego wycinka najważniejszych mechanizmów e-commerce. Cała identyfikacja wizualna, w tym logo oraz interfejs użytkownika, została wymyślona i zaprojektowana przeze mnie od podstaw w programach Figma oraz Adobe Illustrator.
Stos technologiczny i architektura

  Backend został napisany w środowisku PHP 8.x (Vanilla), co obejmuje autorski system routingu i obsługi API bez wykorzystania zewnętrznych frameworków.

  Baza danych MySQL została zaprojektowana w oparciu o model EAV (Entity-Attribute-Value), co pozwala na elastyczne zarządzanie skomplikowanymi wariantami i atrybutami produktów.

  Frontend opiera się na języku Vanilla JavaScript (ES6+) oraz preprocesorze SCSS, wykorzystując własną architekturę komponentów i mechanizm delegacji zdarzeń w celu optymalizacji wydajności.

Katalog produktów i baza danych

  Ze względu na edukacyjny charakter projektu, baza produktowa została ograniczona do 100 bazowych modeli rakiet. Po uwzględnieniu wszystkich wariantów, system zarządza pulą 174 unikalnych pozycji.

  Baza klientów zawiera ponad 1000 rekordów. Dane produktów oraz profile użytkowników wprowadzałem częściowo ręcznie, a częściowo generowałem przy pomocy narzędzia Mockaroo.

  Trzy pierwsze rakiety w bazie danych (Agility Smash 500, Ultra Light Pro oraz Titanium Ace 800) posiadają w pełni zaimplementowaną logikę wariantów, obejmującą długość rakiety oraz grubość uchwytu.

  Ścieżka wyboru wariantu wymaga od użytkownika w pierwszej kolejności określenia grubości uchwytu (z pomocą dedykowanej tabeli rozmiarów), po czym system dynamicznie udostępnia długości rakiety przypisane do tej konkretnej grubości.

  Działy "Odzież", "Piłki" oraz "Akcesoria" zostały celowo pozostawione puste, aby skupić uwagę na głównej funkcjonalności systemu obsługującej rakiety.

  Dział "Marki" jest w pełni uzupełniony i zintegrowany. Zawiera opisy producentów, do których można przejść również poprzez kliknięcie nazwy marki na karcie produktu. Użycie przycisku "Sprawdź" na kafelku marki przekierowuje użytkownika bezpośrednio na oficjalny kanał producenta w serwisie YouTube.

Autoryzacja i walidacja danych

  System logowania i rejestracji został zaprojektowany od podstaw z naciskiem na standardy bezpieczeństwa.

  Hasła użytkowników są kryptograficznie hashowane, a dane wejściowe przechodzą proces sanitizacji w warstwie backendu. Zastosowanie przygotowanych zapytań (prepared statements) chroni bazę danych przed atakami typu SQL Injection.

  Formularz rejestracyjny zawiera mechanizm autentycznej weryfikacji numeru NIP. Algorytm weryfikuje sumę kontrolną, sprawdzając rzeczywistą poprawność numeru identyfikacji podatkowej z punktu widzenia prawa, a nie jedynie obecność ciągu cyfr.

Proces zakupowy i koszyk

  Mechanizm koszyka po stronie przeglądarki opiera się na pamięci localStorage i jest obsługiwany przez autorską klasę w JavaScript. Rozwiązanie to minimalizuje liczbę zapytań do serwera podczas dodawania produktów.

  Właściwa weryfikacja koszyka następuje po kliknięciu przycisku "Do kasy". Backend sprawdza wówczas stany magazynowe oraz integralność cen, co skutecznie zabezpiecza system przed próbami manipulacji danymi w narzędziach deweloperskich przeglądarki.

  Na etapie składania zamówienia (checkout), formularz automatycznie pobiera z bazy i uzupełnia dane użytkownika, pod warunkiem że jest on w danej sesji zalogowany.

Interfejs i rozwiązania autorskie

  Na karcie produktu zaimplementowano interaktywną lupę umożliwiającą szczegółowy podgląd tekstury i detali rakiety. Jest to całkowicie autorski projekt oparty na właściwości CSS clip-path.

  Działanie oraz mechanikę lupy zaprezentowałem szczegółowo w moim materiale wideo: Zobacz działanie lupy na YouTube.

Stan realizacji i roadmapa

  Wyszukiwarka produktów znajduje się obecnie w fazie mockupu wizualnego – interfejs frontendowy nie został jeszcze zintegrowany z logiką wyszukiwania w bazie danych.

    W procesie zakupowym brakuje ostatecznej weryfikacji koszyka i dostępności bezpośrednio przed autoryzacją transakcji.

    System nie posiada obecnie fizycznie podpiętej bramki płatniczej. Docelowo planowana jest integracja z platformą Stripe.
