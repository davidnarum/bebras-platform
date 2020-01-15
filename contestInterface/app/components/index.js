import MainHeader from './MainHeader';
import ContestHeader from './ContestHeader';
import OldContestHeader from './OldContestHeader';
import Breadcrumbs from './Breadcrumbs';
//import NavigationTabs from './NavigationTabs';
import StartContestForm from './StartContestForm';
import TrainingContestSelection from './TrainingContestSelection';
import RestartContestForm from './RestartContestForm';
import GroupUsedForm from './GroupUsedForm';
import PersonalDataForm from './PersonalDataForm';
import SubcontestSelectionInterface from './SubcontestSelectionInterface';
import ContestEndReminder from './ContestEndReminder';
import LoadingPage from './LoadingPage';
import GridView from './GridView';
import OldListView from './OldListView';
import TaskFrame from './TaskFrame';
import ContestEndWaitingPage from './ContestEndWaitingPage';
import ContestQuestionRecoveryPage from './ContestQuestionRecoveryPage';
import ContestEndPage from './ContestEndPage';
import StartContest from './StartContest';
import AllContestsDone from './AllContestsDone';
import PersonalPage from './PersonalPage';
import PersonalDataEditor from './PersonalDataEditor';
import HomePage from './HomePage';
import GroupConfirmation from './GroupConfirmation';
import Contests from './Contests';
import StartContestMenu from './StartContestMenu';
import PreloadPage from './PreloadPage';


var UI = {
    MainHeader,
    ContestHeader,
    OldContestHeader,
    Breadcrumbs,
    StartContestForm,
    TrainingContestSelection,
    RestartContestForm,
    GroupUsedForm,
    PersonalDataForm,
    SubcontestSelectionInterface,
    ContestEndReminder,
    LoadingPage,
    GridView,
    OldListView,
    TaskFrame,
    ContestEndWaitingPage,
    ContestQuestionRecoveryPage,
    ContestEndPage,
    StartContest,
    AllContestsDone,
    PersonalPage,
    PersonalDataEditor,
    HomePage,
    GroupConfirmation,
    Contests,
    StartContestMenu,
    PreloadPage
};


var components = Object.keys(UI);
for (var i = 0; i < components.length; i++) {
	var component = UI[components[i]];
	if (typeof component.init === "function") {
		component.init();
	}
}


export default UI;