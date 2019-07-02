<?php

declare(strict_types = 1);

/**
 * Naudojantis mysql komandomis sukurti saskaitos lenteliu struktura.
 * Bei papildyti reikiamais laukais kurie reiklingi rysiams
 *
 * Table: invoices
 * - id
 * - total_amount
 * - vat
 * - vat_amount
 * - notes
 *
 * Table: invoice_items
 * - id
 * - copy product table some structure
 *
 * Table: invoice_details
 * - id
 * - buyer {true/false}
 * - details
 */