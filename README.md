# Buy Me a Coffee with Bitcoin

## Introduction

Buy Me a Coffee with Bitcoin is a simple donation platform that allows creators to receive Bitcoin payments via the Lightning Network. Visitors can support creators by sending Bitcoin payments throught a Lightning invoice.

### Features

- Creator account registration and unique profile link generation
- Secure authentication using PHP and MySQL
- Payment form with BTC amount input
- Lightning Network invoice generation using a provider (BTCPay Server, LNbits, OpenNode, etc.)
- Payment status monitoring and confirmation system

### Technologies Used

- PHP (Backend)
- HTML, CSS, JavaScript (Frontend)
- MySQL (Database)
- Lightning Network API (BTCPay Server, LNbits, OpenNode)

### Installation

### Prerequisites

- XAMPP (or any PHP server)
- MySQL database
- Lightning Network provider account

### Steps to Set Up

1. Clone the Repository

```
git clone https://github.com/KarlGusta/BTCoffee.git
cd BTCoffee 
```

2. Set Up the Database

- Import the provided `database.sql` file into MySQL.
- Update database credentials in `config.php`.

3. Start the Server

- Run Apache and MySQL in XAMPP.
- Open the project in the browser: `http://localhost/BTCoffee/`

## Usage

1. Creator Registration

- Sign up as a creator.
- A unique profile link is generated.

2. Visitor Payments

- Visit the creator's link.
- Enter the BTC amount and submit the form.
- A Lightning invoice is generated.

3. Payment Confirmation

- The system checks for payment status.
- Once confirmed, the creator receives a notification.

## API Integration

To integration with the Lightning Network, configure the API credentials in `config.php`:

```
$api_key = 'YOUR_LIGHTNING_API_KEY';
$provider_url = 'https://your-lightning-provider.com/api'; 
```

## Lightning Network Integration

This project uses OpenNode for Lightning Network payments. To set up:

1. Create an account at [OpenNode](https://www.opennode.com/)
2. Get your API keys from the dashboard
3. Add your API keys to `config/lightning_config.php`
4. Set up a webhook in your OpenNode dashboard pointing to:
`https://yourdormain.com/handlers/payment_callback.php` 

For testing, use OpenNode's test environment and API keys.

## Future Enhancements

- Add email notifications for successful payments
- Implement a leaderboard for top supporters
- Support for additional cryptocurrencies

## License

This project is open-source under the MIT License.

## Contributing

Pull requests are welcome! For major changes, please open an issue first to discuss what you would like to change.

## Contact

For questions, reach out at karlgustaesimit@gmail.com or create an issue on GitHub.
