# 💆‍♂️ Laravel 13 - Thaimassage Bokning & Administrationssystem

Detta är ett dynamiskt webbprojekt byggt med **Laravel 13**. Systemet är framtaget för en thaimassage-salong och innehåller ett komplett administrationsgränssnitt (CRUD) där ägaren kan hantera salongens tjänster, samt ett integrerat kontaktformulär med automatiserade e-postutskick.

## 🛠 Tech Stack
*   **Backend:** Laravel 13 & PHP 8.5+
*   **Autentisering:** Laravel Breeze (för säker inloggning till adminpanelen)
*   **Frontend:** Alpine.js (för sömlös reaktivitet) & Tailwind CSS (för modern, responsiv design)
*   **Databas:** SQLite / MySQL (för lagring av behandlingar och priser)

## ✨ Nyckelfunktioner

### 🔐 Administrationspanel (CRUD)
Ett skyddat administrationsgränssnitt där behöriga användare kan hantera salongens utbud i realtid:
*   **Skapa (Create):** Lägg till nya massagebehandlingar, beskrivningar och priser.
*   **Visa (Read):** Dynamisk visning av prislistan på den publika landningssidan direkt från databasen.
*   **Uppdatera (Update):** Ändra priser, tidslängder eller textbeskrivningar på befintliga behandlingar.
*   **Radera (Delete):** Ta bort behandlingar som inte längre erbjuds.

### 📬 Kontaktsida & Mailable
*   **Kontaktformulär:** Validering av kunduppgifter på serversidan.
*   **Mailable:** Använder Laravels `Mailable`-klasser för att strukturera och skicka ett HTML-formaterat e-postmeddelande till salongens administratör så fort en kund skickar ett meddelande.

---

## 🚀 Installation (För att köra lokalt)

Följ dessa steg för att installera och köra projektet på din egen dator:

1. **Klona projektet:**
   ```bash
   git clone https://github.com
   cd DITT-REPOSITORIUM
   ```

2. **Installera PHP-beroenden:**
   ```bash
   composer install
   ```

3. **Installera frontend-beroenden & bygg assets:**
   ```bash
   npm install
   npm run dev
   ```

4. **Skapa din miljöfil (.env):**
   ```bash
   cp .env.example .env
   ```
   *Öppna `.env` och konfigurera dina databasinställningar samt SMTP för e-post (t.ex. Mailpit eller Mailtrap).*

5. **Generera applikationsnyckel & kör migreringar:**
   ```bash
   php artisan key:generate
   php artisan migrate
   ```

6. **Starta den lokala servern:**
   ```bash
   php artisan serve
   ```
   Besök sedan `http://127.0.0.1:8000` i din webbläsare!

