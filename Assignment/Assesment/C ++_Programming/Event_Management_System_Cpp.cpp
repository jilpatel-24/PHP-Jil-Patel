#include <iostream>
#include <cmath>   // for ceil()
#include <iomanip> // for formatting
#include <string>
using namespace std;

// Constants (Rate Card)
const double CostPerHour = 18.50;
const double CostPerMinute = 0.40;
const double CostOfDinner = 20.70;

// Class using OOP concept
class EventManager {
private:
    string eventName;
    string firstName, lastName;
    int numberOfGuests;
    int numberOfMinutes;

    int numberOfServers;
    double costForOneServer;
    double totalFoodCost;
    double averageCost;
    double totalCost;
    double depositAmount;

public:
    // Function to take input
    void getInput() {
        cout << "************ Event Management System ************" << endl;

        cout << "Enter the name of the event: ";
        cin.ignore();
        getline(cin, eventName);   // FIX: allows spaces like "Birthday Party"

        cout << "Enter the customer's first and last name: ";
        cin >> firstName >> lastName;

        cout << "Enter the number of guests: ";
        cin >> numberOfGuests;     // FIX: now actually reading input

        cout << "Enter the number of minutes in the event: ";
        cin >> numberOfMinutes;    // FIX: now actually reading input
    }

    // Function to calculate servers
    void calculateServers() {
        if(numberOfGuests > 0)
            numberOfServers = ceil((double)numberOfGuests / 20);
        else
            numberOfServers = 0;
    }

    // Function to calculate cost for one server
    void calculateServerCost() {
        double cost1 = (numberOfMinutes / 60) * CostPerHour;
        double cost2 = (numberOfMinutes % 60) * CostPerMinute;
        costForOneServer = cost1 + cost2;
    }

    // Function to calculate food cost
    void calculateFoodCost() {
        totalFoodCost = numberOfGuests * CostOfDinner;
    }

    // Function to calculate average cost
    void calculateAverageCost() {
        if(numberOfGuests > 0)
            averageCost = totalFoodCost / numberOfGuests;
        else
            averageCost = 0;
    }

    // Function to calculate total cost
    void calculateTotalCost() {
        totalCost = totalFoodCost + (costForOneServer * numberOfServers);
    }

    // Function to calculate deposit
    void calculateDeposit() {
        depositAmount = totalCost * 0.25;
    }

    // Function to display output
    void displayResult() {
        cout << fixed << setprecision(2);
        cout << "\n============= Event estimate for: " << eventName << " " << firstName << " " << lastName << " =============" << endl;
        cout << "Number of Servers: " << numberOfServers << endl;
        cout << "The Cost for Servers: " << costForOneServer * numberOfServers << endl;
        cout << "The Cost for Food is: " << totalFoodCost << endl;
        cout << "Average Cost Per Person: " << averageCost << endl;

        cout << "\nTotal cost is: " << totalCost << endl;
        cout << "Please deposit a 25% deposit to reserve the event" << endl;
        cout << "The deposit needed is: " << depositAmount << endl;
    }

    // Master function
    void processEvent() {
        calculateServers();
        calculateServerCost();
        calculateFoodCost();
        calculateAverageCost();
        calculateTotalCost();
        calculateDeposit();
        displayResult();
    }
};

int main() {
    EventManager event;
    event.getInput();      // Input
    event.processEvent();  // Processing + Output
    return 0;
}

