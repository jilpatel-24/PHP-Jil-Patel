#include <stdio.h>

int main() {
    int choice, qty;
    char more;
    float total = 0;

    do {
        // Display Menu
        printf("\n========== FOOD MENU ==========");
        printf("\n1. Burger      - Rs.120");
        printf("\n2. Pizza       - Rs.250");
        printf("\n3. Sandwich    - Rs.100");
        printf("\n4. French Fries- Rs.80");
        printf("\n5. Coffee      - Rs.60");
        printf("\n===============================\n");

        // User choice
        printf("Enter your choice: ");
        scanf("%d", &choice);

        // Quantity input
        printf("Enter quantity: ");
        scanf("%d", &qty);

        // Conditional logic
        if(choice == 1) {
            total = total + (120 * qty);
        }
        else if(choice == 2) {
            total = total + (250 * qty);
        }
        else if(choice == 3) {
            total = total + (100 * qty);
        }
        else if(choice == 4) {
            total = total + (80 * qty);
        }
        else if(choice == 5) {
            total = total + (60 * qty);
        }
        else {
            printf("Invalid choice!\n");
        }

        // Ask for more items
        printf("Do you want to order more? (y/n): ");
        scanf(" %c", &more);

    } while(more == 'y' || more == 'Y');

    // Final bill
    printf("\n===============================\n");
    printf("Final Bill Amount = Rs. %.2f", total);
    printf("\nThank you for your order!\n");
    printf("===============================\n");

    return 0;
}

