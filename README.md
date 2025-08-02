# Laravel Mailchimp

A simple Laravel 10–12+ compatible package to integrate with the Mailchimp API for email list management, tagging, unsubscribing, and campaign reporting.

## ✨ Features

- ✅ Connect to Mailchimp API
- 📥 Subscribe users to mailing lists
- 🏷️ Add tags to subscribers
- 🚫 Unsubscribe users
- 📊 Retrieve campaign reports
- 📄 Custom subscription form view
- 🔧 Laravel config publishing support

## 🛠 Requirements

- PHP ^8.2
- Laravel ^10.0|^11.0|^12.0
- Guzzle 7+

## 🚀 Installation

### Step 1: Require the Package

```bash
composer require yourname/laravel-mailchimp
```

### Step 2: Publish the Config

```bash
php artisan vendor:publish --provider="MailchimpSubscribe\MailchimpServiceProvider"
```

### Step 3: Set ENV Variables

```
MAILCHIMP_API_KEY=your-mailchimp-api-key
MAILCHIMP_SERVER_PREFIX=usX
MAILCHIMP_LIST_ID=xxxxxxxxxx
```

## 📦 Usage

### Subscribe a user

```php
use MailchimpSubscribe\Facades\MailchimpSubscribe;

MailchimpSubscribe::subscribe('user@example.com', ['FNAME' => 'John']);
```

### Add Tags

```php
MailchimpSubscribe::addTags('user@example.com', ['VIP', 'Newsletter']);
```

### Unsubscribe

```php
MailchimpSubscribe::unsubscribe('user@example.com');
```

### Get Lists

```php
$lists = MailchimpSubscribe::getLists();
```

### Get Campaign Reports

```php
$reports = MailchimpSubscribe::getCampaignReports();
$report = MailchimpSubscribe::getCampaignReportById('abc123');
```

## 📥 Subscription Form

Visit `/subscribe` for the basic subscription form included.

## 🔧 Configuration

Config file: `config/mailchimp.php`  
You can customize your API key, server prefix, and list ID here.

## 📂 File Structure

- `src/` - Service Provider, Manager, Facade
- `resources/views/` - Subscription Blade form
- `routes/web.php` - Form routes
- `config/mailchimp.php` - Config file

## 🤝 License

MIT © [Your Name]
